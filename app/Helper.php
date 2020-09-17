<?php
use App\CmsPageSetting;
use Illuminate\Support\Facades\Mail;

if (!function_exists('getCmsPageData')) {
    function getCmsPageData($settingKey){
        $data = CmsPageSetting::where('settings_key', $settingKey)->first();
        return $data;
    }
}

if (!function_exists('r_info')) {
    function r_info($arr) {

        return '<div class=info style="border:0px solid; display: none">'.'
            '.trim($arr['balance'],' -').' reports available for <u>'.$arr['username'].'</u>
            </div>';
    }
}

if (!function_exists('r_get')) {
    function r_get($code, $chassis, $year, $max_date, $key) {
        if ($chassis=='') {
            die();
        }
        $s = @file_get_contents('http://50.23.198.149/xml/report?code='.$code.'&chassis='.$chassis.'&year='.$year.'&max_date='.$max_date.'&key='.$key);
        $arr = xml2array($s);
        if ( isset($arr['aj'][0]['error']) && $arr['aj'][0]['error']!='') {
            die('<span style="color:#b00">'.$arr['aj'][0]['error'].'</span>');
        }
        return $arr['aj'][0];
    }
}

if (!function_exists('r_list')) {
    function r_list($arr, $chassis, $year, $max_date) {
        $c_arr=array('#73aa00','#70dd7c','#ff0000','#66a16e','#dacb00','#e38553','#5f5b79','#f75957');

        $s='<div class="alert alert-primary">
               <strong>Buy ONLY IF you see your chassis on image!</strong>
            </div>
            <div class=helper>'.$chassis.'</div>';
        if ($arr['row'][0]['color']==0) {$s.='<span style="color:#73aa00;font-size:16px">100% FOUND</span>';}
        $s.='
    <table cellspacing=0 cellpadding=0 class="table table-hover table-bordered">';
        $k=0; $filter=array();
        foreach($arr['row'] as $r) { $k++;
            if ($k>10) {break;} // number of images in listing

            ## for filter
            $r['car_color']=trim($r['car_color'],' -.');
            $filter['car_model'][]=$r['car_model'];
            $filter['car_year'][]=$r['car_year'];
            $filter['car_displacement'][]=$r['car_displacement'];
            $filter['car_transmission'][]=$r['car_transmission'];
            $filter['car_grade'][]=$r['car_grade'];
            $filter['car_color'][]=$r['car_color'];
            $filter['car_result'][]=$r['car_result'];

            $s.='
    <tr class="car_selector_all '.c_tpl('car_model',$r).' '.c_tpl('car_year',$r).' '.c_tpl('car_displacement',$r).' '.c_tpl('car_transmission',$r).' '.c_tpl('car_grade',$r).' '.c_tpl('car_color',$r).' '.c_tpl('car_result',$r).'">
      <td width="50%"><img class="img-thumbnail" src="'.$r['image'].'" style="width: 100%; border-color:'.$c_arr[$r['color']].'"></td>
      <td width="20%" style="font-size:14px;padding-left:4px; vertical-align: middle;">
        '.$r['car_model'].'<br>
        '.$r['car_year'].' '.$r['car_displacement'].'<br>
        '.$r['car_transmission'].' '.$r['car_grade'].'<br>
        '.($r['car_color']==''?'':$r['car_color'].'<br>').'
        '.$r['car_result'].'<br>
      </td>
      <td width="15%" style="text-align: center; vertical-align: middle;">
      <button data-toggle="modal" data-target=".userInfoModal" class="btn btn-info getChassisUrl" data-url="chassis='.$chassis.($year==0?'':'&year='.$year).($max_date==''||$max_date==date('Y-m-d')?'':'&max_date='.$max_date).'&key='.$r['key']."\"
             style='margin-left:7px'>Buy</button>
             </td>
    </tr>\n";
            if ($r['color']==0) {break;} // 0 mean chassis found
        }
        $s.='
  </table>';
        echo filter_out($filter).$s;
    }
}

if (!function_exists('c_tpl')) {
    function c_tpl($s,$r) {
        return $s.'_'.str_replace(' ','_',$r[$s]);
    }
}

if (!function_exists('filter_out')) {
    function filter_out($filter) {
        return /*'<b>Year</b> : '.l_tpl('car_year',$filter).'<br>
                <b>Color</b>: '.l_tpl('car_color',$filter).'<br>
                <b>Status</b>: '.l_tpl('car_result',$filter).'<br>
                <b>Grade</b>: '.l_tpl('car_grade',$filter).'<br>
                <b>Transmission</b>: '.l_tpl('car_transmission',$filter).*/'<br>';
    }
}
if (!function_exists('l_tpl')) {
    function l_tpl($name,$filter) {$s='';
        $arr=$filter[$name];
        $arr=array_unique($arr);
        asort($arr);
        foreach($arr as $val) {
            $s.='<a href="javascript:void(0)" onclick="filter_update(\''.c_tpl($name,array($name=>$val)).'\')" class=r_filter>'.$val.'</a> ';
        } return $s;
    }
}

if (!function_exists('r_show')) {
    function r_show($arr, $sessionArr = null) {
        $paymentId = $sessionArr['payment_id'];
        $cus_name = $sessionArr['cus_name'];
        $cus_email = $sessionArr['cus_email'];

        $generatedUrlId = generatedUrlId();
        \App\AuctionSheetReport::create([
            'url_id' => $generatedUrlId,
            'payment_id' => $paymentId,
            'reports' => json_encode($arr['report']),
        ]);

        if ($paymentId){
            $email = $cus_email;
            Mail::send('fontend.email.report',  ['name' => $cus_name, 'email' => $cus_email, 'url_id' => $generatedUrlId], function ($msg) use ($email)
            {
                $msg->from('support@gari-import.com.bd', 'GARI-IMPORT.com.bd');
                $msg->subject('Auction Sheet Report');
                $msg->to($email);
            });
        }
        /*foreach($arr['report'] as $report) {
            $k = 0;
            $imgs = '';
            echo '<div class=true_report>';
            foreach($report as $key=>$val) { $k++;
                if ( preg_match("/^img/i",$key) ) {
                    $imgs.= '<div class="col-md-6">
                            <a href="'.$val.'" target=_blank><img class="img-thumbnail img-fluid" src="'.$val.'" border=0 width=500px></a>
                        </div>';
                    continue;
                }
                echo '<div class="padding10" '.($k%2==0?'':'style="background:#f0f0f0"').'>'.preg_replace("/_/",' ',ucfirst($key)).': '.$val."</div>";
            }
            echo '</div>';
            echo '<div class="row mt-3 marginTop20">';
            echo $imgs;
            echo '</div>';
        }*/

        return true;
    }
}

if (!function_exists('xml2array')) {
    function xml2array($text) {
        $reg_exp = '/<(\w+)[^>]*>(.*?)<\/\\1>/s';
        preg_match_all($reg_exp, $text, $match);
        foreach ($match[1] as $key=>$val) {
            if ( preg_match($reg_exp, $match[2][$key]) ) {
                $array[$val][] = xml2array($match[2][$key]);
            } else {$array[$val] = $match[2][$key];}
        } return $array;
    }
}

if (!function_exists('chassisRedirectUrl')) {
    function chassisRedirectUrl($chassis_url){
        $url = 'verify-auction-sheet/report?'. $chassis_url;
        echo 'redirecting ................';
        echo '<a style="display: none" id="urlLink" href="'.$url.'">Continue...</a>';
        echo '<script>
              document.getElementById("urlLink").click();
          </script>';
        return true;
    }
}

if (!function_exists('makeHyphenUrl')) {
    function makeHyphenUrl($data){
        $getData =  str_replace(" ","-", $data);
        return strtolower($getData);
    }
}

if (!function_exists('generatedUrlId')) {
    function generatedUrlId() {
        $randResult = '';
        $value = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

        for ($i = 0; $i < 8; $i++) {
            $randResult .= $value[array_rand($value)];
        }
        return time().$randResult;
    }
}

if (!function_exists('makeUCwords')) {
    function makeUCwords($data){
        $getData =  str_replace("_"," ", $data);
        return ucwords($getData);
    }
}





