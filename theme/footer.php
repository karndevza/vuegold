<footer class="footer-fix">
          <div class="container">
          <ul class="nav nav-pills nav-pills-icons d-flex justify-content-center " role="tablist">          
                <li class="nav-item">
                  <a class="nav-link <?=($_SESSION['page']== 'index') ? "active" : "";?>" href="index.php" >                
                    <i class="material-icons">home</i>
                    หน้าหลัก
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?=($_SESSION['page']== 'pricelist') ? "active" : "";?>" href="pricelist.php" >
                    <i class="material-icons">today</i>
                    สรุปรวมทองคำ
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?=($_SESSION['page']== 'cal') ? "active" : "";?>" href="cal.php" >
                    <i class="material-icons">calculate</i>
                    คำนวณทองคำ
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#" >
                    <i class="material-icons">support_agent</i>
                    Service
                  </a>
                </li>               
              </ul>
        
          </div>
</footer>
