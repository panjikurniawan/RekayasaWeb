<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // return view('Dashboard.index', [
        // ]);

       // Ini adalah scrip untuk melakukan request data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Cache-Control: no-cache';
        
            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/Daftarmaba");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            // Executing curl
            $response = curl_exec($curl);
            
            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            } else {
                // Decoding JSON data
                $decodedData =
                    json_decode($response, true);
                // Outputting JSON data in
                // Decoded form
                //var_dump($decodedData);
                $data = $decodedData;
            }
            
            // Closing curl
            curl_close($curl);
            return view('Dashboard.index', ["data"=>$data]);
    }

    public function create()
    {
        return view('Dashboard.create', [
         ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'Nama_Pendaftar' => 'required',
            'Tempat_Lahir' => 'required',
            'Tanggal_Lahir' => 'required',
            'Alamat' => 'required',
            'Jalur_Masuk' => 'required',
            'Prodi' => 'required',
            'Sekolah_Asal' => 'required',
            'No_hp' => 'required',
            'Email' => 'required',
        ]);

        //dd($request);

        $postData = array(
            "Nama_Pendaftar" => $request->input('Nama_Pendaftar'),
            "Tempat_Lahir" => $request->input('Tempat_Lahir'),
            "Tanggal_Lahir" => $request->input('Tanggal_Lahir'),
            "Alamat" => $request->input('Alamat'),
            "Jalur_Masuk" => $request->input('Jalur_Masuk'),
            "Prodi" => $request->input('Prodi'),
            "Sekolah_Asal" => $request->input('Sekolah_Asal'),
            "No_hp" => $request->input('No_hp'),
            "Email" => $request->input('Email')
        );

        $data_string = json_encode($postData);

        // Ini adalah scrip untuk melakukan post data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Content-Length: ' . strlen($data_string);
        
        
            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/Daftarmaba");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
   
            // Executing curl
            $response = curl_exec($curl);
            
            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            } 
            // Closing curl
            curl_close($curl);
            return redirect()->to('/');

    }

    public function edit($id)
    {

        // Ini adalah scrip untuk melakukan request data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Cache-Control: no-cache';
        
            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/detail/$id");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            // Executing curl
            $response = curl_exec($curl);
            
            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            } else {
                // Decoding JSON data
                $decodedData =
                    json_decode($response, true);
                // Outputting JSON data in
                // Decoded form
                //var_dump($decodedData);
                $data = $decodedData;
            }
            
            // Closing curl
            curl_close($curl);
            return view('Dashboard.edit', ["data"=>$data]);
       
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'Nama_Pendaftar' => 'required',
            'Tempat_Lahir' => 'required',
            'Tanggal_Lahir' => 'required',
            'Alamat' => 'required',
            'Jalur_Masuk' => 'required',
            'Prodi' => 'required',
            'Sekolah_Asal' => 'required',
            'No_hp' => 'required',
            'Email' => 'required',
        ]);

        //dd($request->all());

        $postData = array(
            "Nama_Pendaftar" => $request->input('Nama_Pendaftar'),
            "Tempat_Lahir" => $request->input('Tempat_Lahir'),
            "Tanggal_Lahir" => $request->input('Tanggal_Lahir'),
            "Alamat" => $request->input('Alamat'),
            "Jalur_Masuk" => $request->input('Jalur_Masuk'),
            "Prodi" => $request->input('Prodi'),
            "Sekolah_Asal" => $request->input('Sekolah_Asal'),
            "No_hp" => $request->input('No_hp'),
            "Email" => $request->input('Email')
        );

        $data_string = json_encode($postData);

        // Ini adalah scrip untuk melakukan post data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Content-Length: ' . strlen($data_string);
        
        
            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/update/$id");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
   
            // Executing curl
            $response = curl_exec($curl);
            
            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            } 
            // Closing curl
            curl_close($curl);
            return redirect()->to('/')->with('success','Data Berhasil Diupdate');
    }

    public function destroy($id)
    {

        // Ini adalah scrip untuk melakukan post data dari Rekweb API yang telah kita buat
        $username = 'user';
        $password = 'user';
        $credentials = base64_encode("$username:$password");

        $headers = [];
        $headers[] = "Authorization: Basic {$credentials}";
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Cache-Control: no-cache';
        $headers[] = 'Content-Length: ';
        
        
            // Initializing curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL,"127.0.0.2:8001/delete/$id");
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
           
   
            // Executing curl
            $response = curl_exec($curl);
            
            // Checking if any error occurs during request or not
            if($e = curl_error($curl)) {
                echo $e;
            } 
            // Closing curl
            curl_close($curl);
            return redirect()->to('/')->with('success','Data Berhasil Dihapus');
    }
}
