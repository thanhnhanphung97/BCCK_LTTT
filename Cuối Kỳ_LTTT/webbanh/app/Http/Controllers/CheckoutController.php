<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\address;
use App\products;
use App\orders;
use App\Http\Requests;
use App\khachhang;
use App\Bill;
use App\BillDetail;
use Session;
use App\WC_Order;
use Mail;
class CheckoutController extends Controller
{
    public function index(){
        //check for user login
        if(Auth::check()){
            $cartItems = Cart::content();
            //echo "checkout";
            return view('page.checkout' , compact(('cartItems')));
        }
        else{
            return redirect('dang-nhap');
        }
    }

     public function formvalidate(Request $request  ){
       $cartItems = Cart::content();
       $cart = Session::get('cart');
      // dd($cartItems);
        $this->validate($request, [
            'fullname' => 'required|min:5|max:35',
            'email' => 'required|min:5|max:35',
            'sdt' => 'required|numeric',
            'diachi' => 'required|min:5|max:25']);

              $userid = Auth::user()->id;

            $customer = new khachhang;
            $customer->name = $request->fullname;

            $customer->email = $request->email;
            $customer->address = $request->diachi;
            $customer->phone = $request->sdt;

            $customer->user_id = $userid;
           // $address->pincode = $request->pincode;
           // $address->payment_type = $request->pay;
            $customer->save();
            $user = Auth::user();
            
            $bill = new Bill;
            //$bill->id = $userid;
            $bill->date_order = date('Y-m-d H:i:s');
            $bill->total =$request->tongtien;
            $bill->payments = $request->pay;
            $bill->note = $request->note;
            $bill->status = 1;
            if($request->pay=="COD")
            {
                $bill->payment_status = 1;
            }
            if ($request->pay=="paypal") {
                $bill->payment_status = 2;
            }
            if ($request->pay=="Ngân lượng") {
                $bill->payment_status = 1;
            }
            $customer->bill()->save($bill);
            foreach($cartItems as $cartItem){
            $bill_detail = new BillDetail;
            $bill_detail->order_id   = $bill->id;
            $bill_detail->product_id = $cartItem->id;
            $bill_detail->quantity = $cartItem->qty;
            $bill_detail->unit_price =  $cartItem->price;
            $bill_detail->save();
            Cart::destroy();
        }
         /* Mail::send('page.maildh',['nguoidung'=>$bill_detail , 'nguoidung'=>$bill], function ($message) use($user)
        {
            $message->from('hdgiahuy1@gmail.com',"Bakers Alley");
            $message->to($user->email,'$user->HoTen');
            $message->subject('Xác nhận tài khoản');
        });*/
        if ($request->pay=="Ngân lượng")
        {
            /*return redirect('https://www.nganluong.vn/button_payment.php?receiver=hdgiahuy1@gmail.com&product_name='.$bill->id.'&price='.$request ->price.'return_url=http://localhost:8080/webbanh');
            */
            return redirect('thongbao');
        }
        else{
            return redirect('thongbao');
        }
        }
        public function activeUser($id){
        $order =  Bill::Find($id);
        if($order){
            $order->status = 1;
            $order->save();
            return redirect()->route('dangki')->with(['thanhcong'=>'Bạn vừa mới đặt hàng thành công']);
        }
    }

    
        //Session::forget('cart');
        //return redirect()->back()->with('thongbao','Đặt hàng thành công');



     

}
