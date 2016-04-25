<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Entity\CartItem;
use App\Entity\Product;

use Log;

class CartController extends Controller
{
  public function index(Request $request)
  {
    $cart_items = array();

    $bk_cart = $request->cookie('bk_cart');
    $bk_cart_arr = ($bk_cart!=null ? explode(',', $bk_cart) : array());

    $member = $request->session()->get('member', '');
    if($member != '') {
      $cart_items = $this->syncCart($member->id, $bk_cart_arr);
      return response()->view('cart', ['cart_items' => $cart_items])->withCookie('bk_cart', null);
    }

    foreach ($bk_cart_arr as $key => $value) {
      $index = strpos($value, ':');
      $cart_item = new CartItem;
      $cart_item->id = $key;
      $cart_item->product_id = substr($value, 0, $index);
      $cart_item->count = (int) substr($value, $index+1);
      $cart_item->product = Product::find($cart_item->product_id);
      if($cart_item->product != null) {
        array_push($cart_items, $cart_item);
      }
    }

    return view('cart')->with('cart_items', $cart_items);
  }

  private function syncCart($member_id, $bk_cart_arr)
  {
    $cart_items = CartItem::where('member_id', $member_id)->get();

    $cart_items_arr = array();
    foreach ($bk_cart_arr as $value) {
      $index = strpos($value, ':');
      $product_id = substr($value, 0, $index);
      $count = (int) substr($value, $index+1);

      // �ж����߹��ﳵ��product_id �Ƿ���� ���ݿ���
      $exist = false;
      foreach ($cart_items as $temp) {
        if($temp->product_id == $product_id) {
          if($temp->count < $count) {
            $temp->count = $count;
            $temp->save();
          }
          $exist = true;
          break;
        }
      }

      // ��������洢����
      if($exist == false) {
        $cart_item = new CartItem;
        $cart_item->member_id = $member_id;
        $cart_item->product_id = $product_id;
        $cart_item->count = $count;
        $cart_item->save();
        $cart_item->product = Product::find($cart_item->product_id);
        array_push($cart_items_arr, $cart_item);
      }
    }

    // Ϊÿ�����󸽼Ӳ�Ʒ���������ʾ
    foreach ($cart_items as $cart_item) {
      $cart_item->product = Product::find($cart_item->product_id);
      array_push($cart_items_arr, $cart_item);
    }

    return $cart_items_arr;
  }
}