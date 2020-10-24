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
     $_SESSION['page'] = "index";
   
            
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
                        $strx = "color_red";
                    }else{
                        $strx = "color_green";
                    }
                    return  $strx;
                    }

                    function chk_table_color($num){
                    if($num<0){
                        $strx = ' class="bg-warning font-size: 150%;font-weight: 500" ';
                    }else{
                        $strx = ' class="bg-success font-size: 150%;font-weight: 500" ';
                    }
                    return  $strx;
                    }
    
    ?>


                <body class="landing-page sidebar-collapse"> 
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
                                                <h2 class="card-title head-card-gold font-SZ text-center">ประกาศของสมาคมค้าทองคำ</h2>
                                                <p class="text-center font-SZ">วันที่ <?=$manage[1][0]['time'];?>  ครั้งที่ <?=$manage[1][0]['upd'];?></p>
                                        </div>
                                    </div>      
                                    <div class="card-body card-b-pad" style="padding: .5rem 0.15rem;" >                                      
                                    <!-- <p class=" gold-font text-center">วันที่ <?=$manage[1][0]['time'];?>  ครั้งที่ <?=$manage[1][0]['upd'];?>  </p> -->
                                    <div class="table-responsive"> 
                                        <table class="table text-center">
                                            <thead  class="thead-info">

                                            <tr>
                                                <th class="gold-font" scope="col"># 96.5%</th>
                                                <th class="gold-font" scope="col"> ซื้อ</th>
                                                <th class="gold-font"  scope="col"> ขาย</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="gold-font" >ทองคำแท่ง</td>
                                                
                                                <td class=" text-center <?=$cls_color;?>"><?=$manage[1][0]['blbuy'];?></td>
                                                <td class=" text-center <?=$cls_color;?>"><?=$manage[1][0]['blbuy'];?></td>
                                            </tr>
                                            <tr>
                                                <td class="gold-font" >ทองรูปพรรณ</td>
                                                <td class=" text-center <?=$cls_color;?>"><?=$manage[1][0]['ombuy'];?></td>
                                                <td class=" text-center <?=$cls_color;?>"><?=$manage[1][0]['omsell'];?></td>
                                            </tr>
                                            <tr>                                            
                                                <td class="gold-font"  >วันนี้ <?= $strnum;?></td>
                                                <td class=" text-center <?=$cls_color;?>"><?=$pupd;?></td>    
                                                <td class="text-center <?=$cls_color;?>"><?=$pupd;?></td>                                  
                                            </tr>
                                            </tbody>
                                            
                                            </table>
                                     </div>      
                                    </div>
                                    <div class="gold-font card-footer text-center">Goldspot <?=$manage[1][0]['gspot'];?> | USD <?=$manage[1][0]['usd'];?></div>
                             
                          
                            </div>

                            <div class="card card-main-bg"  style="margin-top: 35px;">
                                    <div class="card-h-color card-header card-header-text" style="
                                        background: linear-gradient(60deg, rgba(212,175,55,1) 0%, rgba(212,175,55,1) 35%); padding: 0.005rem;">
                                        <div class="card-text">
                                                <h2 class="card-title head-card-gold font-SZ text-center">คำนวณราคาทองคำ</h2>
                                                
                                        </div>
                                    </div>      
                                    <div class="card-body card-b-pad" style="padding: .5rem 0.15rem;" >
                                    <div class="table-responsive">                                      
                                            <table class="table">
                                            <?php 
                                            function toNumber($val) {
                                                $val =   str_replace(',','',$val);
                                                if (is_numeric($val)) {
                                                    $int = (int)$val;
                                                    $float = (float)$val;
                                            
                                                    $val = ($int == $float) ? $int : $float;
                                                    return $val;
                                                } else {
                                                    trigger_error("Cannot cast $val to a number", E_USER_WARNING);
                                                    return null;
                                                }
                                            }
                                            $golds = toNumber($manage[1][0]['ombuy']);
                                            
                                            ?>
                                                    <thead>
                                                        <tr>                             
                                                            <th class="text-center font-SZ"  >ทองคำรูปพรรณ</th>
                                                            <th class="text-center font-SZ">ราคา/บาท</th>                                                             
                                                        </tr>
                                                    </thead>
                                                    <tbody class="gold-font">
                                                    <tr>
                                                        <td class="text-center font-SZ" >1 บาท</td>  
                                                        <td class="text-center font-SZ"><?=number_format($golds,2);?></td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center font-SZ">2 สลึง</td>  
                                                        <td class="text-center font-SZ"><?=number_format(($golds/2),2);?></td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center font-SZ">1 สลึง</td>  
                                                        <td class="text-center font-SZ"><?=number_format((($golds)/4),2);?></td> 
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center font-SZ">ครึ่งสลึง</td>  
                                                        <td class="text-center font-SZ"><?=number_format(((($golds/4))/2),2);?></td> 
                                                    </tr>

                                                    </tbody>
                                            </table>
                                            </div>
                                    </div>
                                   
                          
                            </div>


                            
                        </div> <!-- end - main main-raised -->

                  
        <?php 
            include_once("theme/footer.php");
            include_once("theme/scirpt.php");
        ?>
</body>
</html>
