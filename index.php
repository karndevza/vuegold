<!DOCTYPE html>
<html lang="en">
    
    <?php 
    error_reporting(E_ALL ^ E_NOTICE);
    ini_set('max_execution_time', 0);
    ini_set("memory_limit", "1024M");  
    header('Content-Type: text/html; charset=UTF-8');  
    $urls = 'https://zpay2.000webhostapp.com/api/gold.json';
    $homepage = file_get_contents($urls);  
    $data = $homepage;
    $manage = json_decode($data, true);
    
    include_once("theme/head.php"); 
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
                                                <td><?=$manage[1][0]['blbuy'];?></td>
                                                <td><?=$manage[1][0]['blbuy'];?></td>
                                            </tr>
                                            <tr>
                                                <td>ทองรูปพรรณ</td>
                                                <td><?=$manage[1][0]['ombuy'];?></td>
                                                <td><?=$manage[1][0]['omsell'];?></td>
                                            </tr>
                                            <tr>
                                                <td>วันนี้ </td>
                                                <td colspan="2" ><?=$manage[1][0]['price'];?> </td>                                   
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
