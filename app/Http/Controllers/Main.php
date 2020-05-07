<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use App\Donation;
use App\Thana;
use App\Category;
use App\Subcategory;
use App\District;
use App\Cateh;
use App\donation_form;
use Illuminate\Support\Facades\Validator;
use Session;
use Redirect;
use PDF;

class Main extends Controller
{
    public function viewRecipt($id){
        $affected = DB::table('donation_forms')->where('id', $id)->update(['status' => "APPROVED"]);
        return view('receipt');
    }

    public function generateInvoice(){
        $pdf = PDF::loadView('receipt');
return $pdf->download('invoice.pdf');
    }

    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|size:11|unique:users,mobile',
            'address' => '',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $user = UserModel::create([
                'name'      => request()->input('name'),
                'email'     => strtolower(request()->input('email')),
                'mobile'    => request()->input('mobile'),
                'address'   => request()->input('address'),
                'rank'      => 'user',
                'status'    => 'active'
            ]);
            //$user->notify(new RegistrationEmailNotification($user));
            $this->setSuccess('Account Registration Successful! Check Your Mobile for SMS Confirmation');
            /*$sms = 'Dear '.request()->input('name').', Your Account Registration is Successful. Please login using your 11 digit mobile number. Regards, Swift Trade.';
            $myfile = fopen("sms.txt", "r") or die("Unable to open file!");
            $current = fread($myfile,filesize("sms.txt"));
            if($current == 'ON') {
                $this->sendSMS(request()->input('mobile'),$sms);
                $qty = (-1)*((strlen($sms)/160));
                SMS_LogModel::create([
                    'sms_quantity' => $qty,
                    'sms_recipient' => request()->input('mobile'),
                    'sms_text' =>$sms
                ]);
            }*/

            return redirect()->route('index');
        } catch (\Exception $e) {
            $this->setError($e->getMessage());
            return redirect()->back();
        }
    }
    public function registerCharity(){
        
        $validator = Validator::make(request()->all(), [
            'orgName' => 'required',
            'orgAddress' => 'required',
            'orgMobile' => 'required|size:11|unique:users,orgMobile',
            'orgEmail' => 'required|email|unique:users,orgEmail',
            'password' => 'required',
            'categoryID' => 'required',
            'regDate' => 'required',
            'contactPersonName' => 'required',
            'contactPersonNo' => 'required',
            'contactPersonPosition' => 'required'
            
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        echo "<pre>";
        print_r(request()->all());
        echo "</pre>";
        try {
            
            $user = new User;
            $user->orgName = request()->orgName;
            $user->orgAddress = request()->orgAddress;
            $user->districtID = request()->districtID;
            $user->thanaID = request()->thanaID;
            $user->telephoneNo = request()->telephoneNo;
            $user->orgMobile = request()->orgMobile;
            $user->categoryID = request()->categoryID;
            $user->orgEmail = request()->orgEmail;
            $user->website = request()->website;
            $user->regDate = request()->regDate;
            $user->password = request()->password;
            $user->orgType = request()->orgType;
            $user->NGO = request()->NGO;
            $user->DSS = request()->DSS;
            $user->Zakat = request()->Zakat;
            $user->Stock = request()->Stock;
            $user->contactPersonName = request()->contactPersonName;
            $user->contactPersonNo = request()->contactPersonNo;
            $user->contactPersonPosition = request()->contactPersonPosition;
            $user->role = 'charity';
            
            $user->save();
            
            /*
            $user = User::create([
                'name' => request()->input('name'),
                'address' => request()->input('address'),
                'mobile' => request()->input('mobile'),
                'email' => strtolower(request()->input('email')),
                'password' => request()->input('password'),
                'role' => 'charity',
                //'items' => request()->input('items'),
                'items' => 2,
                
            ]);
            */
            $this->setSuccess('Charity Registration Successful! Check Your E-Mail for Confirmation');
            //$user->notify(new RegistrationEmailNotification($user));
            return redirect()->route('charity-register');
        } catch (\Exception $e) {
            $this->setError($e->getMessage());
            return redirect()->back();
        }
    }

    public function registerDonor(){
        
        echo "<pre>";
        print_r(request()->all());
        echo "</pre>";
    
        $validator = Validator::make(request()->all(), [
            'orgName' => 'required',
            'orgAddress' => 'required',
            'orgMobile' => 'required|size:11|unique:users,orgMobile',
            'orgEmail' => 'required|email|unique:users,orgEmail',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $user = new User;
            $user->orgName = request()->orgName;
            $user->orgAddress = request()->orgAddress;
            $user->districtID = request()->districtID;
            $user->thanaID = request()->thanaID;
            $user->orgMobile = request()->orgMobile;
            $user->orgEmail = request()->orgEmail;
            $user->password = request()->password;
            $user->occupation = request()->occupation;
            
            $user->role = 'donor';
            
            $user->save();
            
            
            /*
            $user = User::create([
                'name' => request()->input('name'),
                'address' => request()->input('address'),
                'mobile' => request()->input('mobile'),
                'email' => strtolower(request()->input('email')),
                'password' => request()->input('password'),
                'role' => 'donor',
                'items' => '',
            ]);
            */
            $this->setSuccess('Donor Registration Successful! Check Your E-Mail for Confirmation');
            //$user->notify(new RegistrationEmailNotification($user));
            return redirect()->route('donor-register');
        } catch (\Exception $e) {
            $this->setError($e->getMessage());
            return redirect()->back();
        }
    }

    public function donorHome(){
        $category = category::all();
        $subcategory = subcategory::all();
        $district = district::orderBy('name','asc')->get();
        return view('donor-home',compact('category','district','subcategory'));
    }
    public function login(){
        $validator = Validator::make(request()->all(), [
            'email'  => 'required',
            'password'=> 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credentials = request()->except(['_token']);
        $user = User::where('orgEmail', '=', $credentials['email'])->where('password', '=', $credentials['password'] );

        if ($user->count()==1) {
            $user = $user->first();
            $data = [
                'user_id'   => $user->user_id,
                'name'      => $user->orgName,
                'email'     => $user->orgEmail,
                'mobile'    => $user->orgMobile,
                'address'   => $user->orgAddress,
                'role'      => $user->role,
                'cat_id'    => $user->categoryID
            ];
            Session::put('swift_trade_user_data', $data);
            //$this->setSuccess('User logged in.');
            return redirect('/'.$data['role'].'/home');
        }
        $this->setError('Invalid credentials.');
        return redirect()->back();
    }

    public function charityList(){
        $district = request()->input('district_id');
        $thana_id = request()->input('thana_id');
        $subcategory = request()->input('subcategory');
        $category = request()->input('category');
        
        $charity = donation_form::where('district_id','=',$district)->where('thana_id','=',$thana_id)->where('subcat_id','=',$subcategory)->get()->toArray();
  
        $data = [
            'charity' => $charity,
            'district' => $district,
        ];
        return view('charity-list', $data);
        
    }

    public function donationForm($id){
        
        $data = User::where('user_id', '=', $id)->get()->toArray();
        foreach ($data as $d){
            $data = $d;
            break;
        }
        return view('donation-page', compact('data'));
    }

    public function makeDonation(){
        $user_id = session('swift_trade_user_data');
        try {
            $user = Donation::create([
                'user_id' => $user_id['user_id'],
                'charity_id' => request()->input('user_id'),
                'items' => request()->input('items'),
                'contact_person' => request()->input('contact_person'),
                'pickup_location' => request()->input('pickup_location'),
                'mobile' => request()->input('mobile'),
                'quantity' => request()->input('quantity'),
                'note' => request()->input('note'),
                'status' => 'pending',

            ]);
            $asasas =  $user->donation_id;
            //$sms = 'Please Collect '.request()->input('items').' from '.request()->input('pickup_location').'. Contact: '.request()->input('mobile');
            //$this->sendSMS(request()->input('mobile'),$sms);
            return redirect('/donation/'.$asasas);
            //$user->notify(new RegistrationEmailNotification($user));
            echo 'Try';
        } catch (\Exception $e) {
            echo $e;
        }
    }

    public function donationDetails($id){
        $data = Donation::where('donation_id', '=', $id)->get()->toArray();
        //print_r($data);
        foreach ($data as $d){
            $data = $d;
            break;
        }
        //print_r($data);
        $charity = User::where('user_id', '=', $data['charity_id'])->get()->toArray();
        $data['charity_info'] = $charity;
        return view('donation-details', $data);
    }

    public function charityHome(){
        $user_id = session('swift_trade_user_data');
        $donation = Donation::where('charity_id', '=', $user_id['user_id'])->get()->toArray();
        $data = [];
        $data['donations'] = $donation;
        
        /**/
        $finInfo = User::where('user_id', '=', $user_id['user_id'])->get()->toArray();
        $district = request()->input('district_id');
        $thana_id = request()->input('thana_id');
        $subcategory = request()->input('subcategory');
        $category = request()->input('category');
        
        $applicationList = donation_form::where('user_id','=',$user_id['user_id'])->get()->toArray();
  
        $data = [
            'applicationList' => $applicationList,
            'finInfo' => $finInfo
        ];
        
        /**/
        
        return view('charity-home', $data);
    }

    public function testUser(){
        try {
            $user = User::create([
                'name' => 'Test',
                'address' => 'Test',
                'mobile' => 'Test',
                'email' => 'Test',
                'password' => '12345',
                'role' => 'Test',
                'items' => 'Test'
            ]);
            //$user->notify(new RegistrationEmailNotification($user));
            echo 'Try';
        } catch (\Exception $e) {
            echo $e;
        }
        echo 'Finish';
    }

    public function testDonation(){
        try {
            $user = Donation::create([
                'user_id' => 1,
                'items' => 'Test',
                'contact_person' => 'Test',
                'pickup_location' => 'Test',
                'mobile' => '12345',
                'quantity' => 'Test',
                'note' => 'Test',
                'status' => 'Test',

            ]);
            //$user->notify(new RegistrationEmailNotification($user));
            echo 'Try';
        } catch (\Exception $e) {
            echo $e;
        }
        echo 'Finish';
    }
    
    public function donationFormSubmit(Request $request){
        //dd($request);
        $id = Session::get('swift_trade_user_data')['user_id'];
        
        for($i=0;$i < $request->count+1;$i++){
            $item_str = "subcat_".$i;
            $qty_str = "qty_".$i;
            $price_str = "price_".$i;
            $note_str = "note_".$i;

            $donation_form = new donation_form;
            $donation_form->subcat_id = $request->$item_str;
            $donation_form->qty = $request->$qty_str;
            $donation_form->price = $request->$price_str;
            $donation_form->user_id = $id;
            $donation_form->district_id = $request->district_id; 
            $donation_form->thana_id = $request->thana_id;
            $donation_form->note = $request->$note_str;
            $donation_form->status = 'PENDING'; 
            
            
            $donation_form->save();
        }
        Session::flash('message', "Form submitted succesfully");
        echo "Hello!";
        return Redirect::back();
    }
    
    public function financialInfoSubmit(Request $request){
        //dd($request->count);
        $id = Session::get('swift_trade_user_data')['user_id'];
        
        $affected = DB::table('users')
              ->where('user_id', $id)
              ->update([
                  'bkash' => $request->bkash,
                  'bankDetails' => $request->bankDetails
              ]);
        

        Session::flash('message', "Financial Information submitted succesfully");
        return Redirect::back();
    }
    

}
