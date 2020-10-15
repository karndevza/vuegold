<!DOCTYPE html>
<html lang="en">
    
    <?php 
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('max_execution_time', 0);
    header('Content-Type: text/html; charset=UTF-8'); 
    include_once("theme/head.php");  
    $urls = 'https://zpay2.000webhostapp.com/api/gold.json';
    $homepage = file_get_contents($urls);  
    $data = $homepage;
    $manage = json_decode($data, true);
            
        $num = 0; $nums=0;
        $price = array();

        if($manage[0]['status']=='fail'){
            $data ='fail';

        }else{
            $data ='true';

        for ($i = 0 ; $i < count($manage[1]); $i++) {    
            $num = $manage[1][$i]['price'];
            $nums = $nums +  $manage[1][$i]['price'];
        }
        if($nums<0){
                $strnum = '<i class="fa fa-sort-down" style="font-size:28px;color:red"><font color="red"> '.$nums.'</font>';
                
            } else{
            $strnum = '<i class="fa fa-sort-up" style="font-size:28px;color:green"><font color="green"> '.$nums.'</font>';
            
            }  

            if($manage[1][0]['price']<0){
            $pupd = '<i class="fa fa-sort-down" style="font-size:28px;color:red"></i><font color="red">'.$manage[1][0]['price'].'</font>';
            $cls_color = "color_red";
            }else{
            $pupd = '<i class="fa fa-sort-up" style="font-size:28px;color:green"></i><font color="green">'.$manage[1][0]['price'].'</font>';
            $cls_color = "color_green";
            }
        }  
        

                    function chk_color($num){
                    if($num<0){
                        $strx = "color_red_pl";
                    }else{
                        $strx = "color_green_pl";
                    }
                    return  $strx;
                    }

                    function chk_table_color($num){
                    if($num<0){
                        $strx = ' class="bg-warning font-size: 120%;font-weight: 300" ';
                    }else{
                        $strx = ' class="bg-success font-size: 120%;font-weight: 300" ';
                    }
                    return  $strx;
                    }
    
    ?>


                <body class="landing-page sidebar-collapse"  > 
                    <?php include_once("theme/nav.php");?>
                        <div class="main main-raised" style="margin: 0px 3px 0px;">  <!-- start - main main-raised -->
                            <div class="container">
                                <div class=" text-center ">                 
                                        <div class="row">
                                        </div>
                                </div>
                            </div>
                            <div class="card card-main-bg"  style="margin-top: 20px;">
                                    <div class="card-h-color card-header card-header-text"  style="
                                        background: linear-gradient(60deg, rgba(212,175,55,1) 0%, rgba(212,175,55,1) 35%); padding: 0.005rem;" >
                                        <div class="card-text">
                                                <h2 class="card-title head-card-gold font-SZ text-center">การปรับเปลี่ยนราคาทองคำระหว่างวัน</h2>
                                                <p class="text-center font-SZ">วันที่ <?=$manage[1][0]['time'];?>  ครั้งที่ <?=$manage[1][0]['upd'];?></p>
                                        </div>
                                    </div>      
                                    <div class="card-body card-b-pad" style="padding: .5rem 0.15rem;" >                                      
                                    <!-- <p class=" gold-font text-center">วันที่ <?=$manage[1][0]['time'];?>  ครั้งที่ <?=$manage[1][0]['upd'];?>  </p> -->
                                    <table class="table">
                            <thead>
                                <tr>                             
                                    <th  class="text-center gold-font">เวลา</th>
                                    <th class="text-center gold-font">ครั้งที่</th>
                                    <th class="text-center gold-font">Gold Spot</th>
                                    <th class="text-center gold-font">USD/บาท</th>
                                    <th class="text-center gold-font">ขึ้นลง</th>                                
                                </tr>
                            </thead>
                            <tbody>
                           
                            <?php 
                            
                            for ($i = 0 ; $i < count($manage[1]); $i++) {
                               $tr_class_color  = chk_table_color($manage[1][$i]['price']);
                                $make_coler = chk_color($manage[1][$i]['price']);
                                $data = '';
                                $data = '<tr  >';
                                $data .= '<td class="text-center '.$make_coler.'">'.$manage[1][$i]['time'].'</td>';                               
                                
                                 $data .= '<td class="text-center '.$make_coler.'">'.$manage[1][$i]['upd'].'</td>';  
                                 $data .= '<td class="text-center '.$make_coler.'">'.$manage[1][$i]['gspot'].'</td>';
                                 $data .= '<td class="text-center '.$make_coler.'">'.$manage[1][$i]['usd'].'</td>';                               
                                $data .= '<td class="text-center '.$make_coler.'">'.$manage[1][$i]['price'].'</td>';
                                $data .= '</td>';
                                echo $data;

                            }
                            ?> 
                            </tbody>
                            </table>
                                    </div>
                                    <div class="gold-font card-footer text-center">Goldspot <?=$manage[1][0]['gspot'];?> | USD <?=$manage[1][0]['usd'];?></div>
                             
                          
                            </div>


                            
                        </div> <!-- end - main main-raised -->

                        
        <?php 
            include_once("theme/footer.php");
            include_once("theme/scirpt.php");
        ?>
</body>
</html>
