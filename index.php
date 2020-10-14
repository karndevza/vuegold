<!DOCTYPE html>
<html lang="en">
    
    <?php 
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('max_execution_time', 0);
    ini_set("memory_limit", "1024M");  
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


                <body class="landing-page sidebar-collapse"  > 
                    <?php include_once("theme/nav.php");?>
                        <div class="main main-raised" style="margin: 0px 3px 0px;">  <!-- start - main main-raised -->
                            <div class="container">
                                <div class=" text-center ">                 
                                <div class="row">
                                </div>
                                </div>
                            </div>
                            <div class="card " id="app" >
                            <div v-for="(result,i) in results">                     
                                <div  v-if="i > 0 "  v-for="value in result" >
                                    <div class="card-header card-gold-bg text-center">  <h5 class=" title gold-font"  >ราคาทองตามประกาศของสมาคมค้าทองคำ </h5></div>
                                    <div class="card-body">  
                                    <p  class=" text-center">วันที่ <?=$manage[1][0]['time'];?>  ครั้งที่ <?=$manage[1][0]['upd'];?>  </p>

                                        <table class="table text-center">
                                            <thead  class="thead-info">

                                            <tr>
                                                <th scope="col"># 96.5%</th>
                                                <th scope="col"># ซื้อ</th>
                                                <th scope="col"># ขาย</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>ทองคำแท่ง</td>
                                                
                                                <td class="text-center <?=$cls_color;?>"><?=$manage[1][0]['blbuy'];?></td>
                                                <td class="text-center <?=$cls_color;?>"><?=$manage[1][0]['blbuy'];?></td>
                                            </tr>
                                            <tr>
                                                <td>ทองรูปพรรณ</td>
                                                <td class="text-center <?=$cls_color;?>"><?=$manage[1][0]['ombuy'];?></td>
                                                <td class="text-center <?=$cls_color;?>"><?=$manage[1][0]['omsell'];?></td>
                                            </tr>
                                            <tr>                                            
                                                <td >วันนี้ <?= $strnum;?></td>
                                                <td class="text-center <?=$cls_color;?>"><?=$pupd;?></td>    
                                                <td class="text-center <?=$cls_color;?>"><?=$pupd;?></td>                                  
                                            </tr>
                                            </tbody>
                                            
                                            </table>
                                    </div>
                                    <div class="card-footer text-center">Goldspot <?=$manage[1][0]['gspot'];?> | USD <?=$manage[1][0]['usd'];?></div>
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
