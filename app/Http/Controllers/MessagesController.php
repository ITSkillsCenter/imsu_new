<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use App\Message;
use App\Message_Receiver;
use App\Role;
use App\StudentInfo;
use App\User;
use GuzzleHttp\Client as GuzzleClient;

class MessagesController extends Controller
{
    public function index(Request $request, $type)
    {

        $messages = Message::where(['type' => $type])->orderBy('id', 'DESC')->get();

        return view('messages.index', compact('messages', 'type'));
    }

    public function create(Request $request, $type)
    {
        if ($request->isMethod('post')) {

            if (count($request->selected_receivers) < 1) {
                return back()->with(['error' => 'No receiver set']);
            }
            if ($type == 'email') {
                $message['subject'] = $request->subject;
                $message['receiver_type'] = $request->role;
                $message['body'] = $request->body;
                $message['type'] = $request->type;
                $message['subject'] = $request->subject;
                $message['faculty_id'] = $request->faculty;
                $message['dept_id'] = $request->department;

                $msg = Message::create($message);
                foreach ($request->selected_ids as $selected) {
                    $receivers['message_id'] = $msg->id;
                    $receivers['receiver_id'] = $selected;
                    Message_Receiver::create($receivers);
                }

                // dd($request->selected_receivers, $request->selected_ids);

                foreach ($request->selected_receivers as $receivers) {
                    $rr[] =  [
                        "to" => [
                            ["email" => $receivers,]
                        ],
                        "subject" => $request->subject,
                    ];
                }


                $send = $this->sendEmail($rr, $request->body);
                $upd = Message::find($msg->id);
                $upd->status = 'sent';
                $upd->save();
                return back()->with(['success' => 'Message sent successfuly']);
            } else {
                // dd($request->all());
                // $to = implode(',', $request->selected_receivers);
                // $message['subject'] = $request->subject;
                // $message['receiver_type'] = $request->role;
                // $message['body'] = $request->body;
                // $message['type'] = $request->type;
                // $message['subject'] = $request->subject;
                // $message['faculty_id'] = $request->faculty;
                // $message['dept_id'] = $request->department;

                // $msg = Message::create($message);
                // foreach ($request->selected_ids as $selected) {
                //     $receivers['message_id'] = $msg->id;
                //     $receivers['receiver_id'] = $selected;
                //     Message_Receiver::create($receivers);
                // }
                // dd($to);
                // $send = $this->sendSMS($to, $message['body'], $message['subject']);

                // dd($send);

                return back()->with(['error' => 'SMS not available']);
            }
        }
        $roles = Role::all();
        $faculties = Faculty::all();

        return view('messages.create', compact('type', 'roles', 'faculties'));
    }



    public function get_receivers(Request $request, $the_type)
    {
        if ($request->type !== 'student') {
            if($request->type == 'all_staffs'){
                $query = User::join('role_user', 'users.id', 'role_user.user_id');
                if ($request->faculty_id !== 'all') {
                    $query->where(['users.faculty_id' => $request->faculty_id]);
                }
                if ($request->dept_id !== 'all') {
                    $query->where(['users.dept_id' => $request->dept_id]);
                }
            }else{
                $query = User::join('role_user', 'users.id', 'role_user.user_id');
                if ($request->type !== 'all') {
                    $query->where(['role_user.role_id' => $request->type]);
                }
                if ($request->faculty_id !== 'all') {
                    $query->where(['users.faculty_id' => $request->faculty_id]);
                }
                if ($request->dept_id !== 'all') {
                    $query->where(['users.dept_id' => $request->dept_id]);
                }
            }
            

            $receivers = $query->get()->toArray();
            $data['body'] = $receivers;
            return $data;
        } else if ($request->type == 'student') {
            if($the_type == 'email'){
                $query = StudentInfo::where('Email_Address', '!=', null);
            }else if($the_type == 'sms'){
                $query = StudentInfo::where('Student_Mobile_Number', '!=', null);
            }

            if ($request->faculty_id !== 'all') {
                $query->where(['faculty_id' => $request->faculty_id]);
            }
            if ($request->dept_id !== 'all') {
                $query->where(['dept_id' => $request->dept_id]);
            }
            if ($request->level !== 'all') {
                $query->where(['level' => $request->level]);
            }
            $receivers = $query->get()->toArray();
            $data['body'] = $receivers;
            return $data;
        }
    }

    public function sendEmail($formatedSubscribers, $mail_body, array $from = [], array $replyTo = [])
    {
        $curl = curl_init();
        $body = [
            "personalizations" => $formatedSubscribers,
            "from" => [
                "email" => env('MAIL_FROM_ADDRESS'),
                "name" => 'IMSU'
            ],
            "reply_to" => [
                "email" => env('MAIL_FROM_ADDRESS'),
                "name" =>  'IMSU'
            ],

            "content" => [
                [
                    "type" => "text/html",
                    "value" =>  $mail_body
                ]
            ],

        ];

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.sendgrid.com/v3/mail/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Accept: application/json',
                'Authorization: Bearer ' . env('MAIL_PASSWORD')
            ),
        ));

        $httpcode = curl_getinfo($curl);

        $response = curl_exec($curl);

        return $response;
    }

    public function sendSMS($receivers, $text, $from)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.bulksmsnigeria.com/api/v1/sms/create',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                "api_token": "ifpmEGpDfCDamjFbaVMYm8eQVySSdKAqVaqZJrJMX2sXjb5x0gzgN2srfSa6",
                "from": "IMSU",
                "to": '.$receivers.',
                "body": '.$text.',
                "dnd": 1
                
            }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        // curl_close($curl);
        return $response;
    }
}
