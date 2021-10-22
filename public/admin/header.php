<div class="container-fluid header-div px-0">
            <header id="header" class="navbar navbar-expand-lg navbar-dark bg-dark navbar-shadow">
              <a id="logotitle" class="head-text text-light title logotitle navbar-brand order-lg-1 me-0 pe-lg-3 me-lg-4" href="/">
                RentClick
              </a>
              <div class=" d-flex justify-content-end order-lg-3" style="width: 100%;">
                <ul class="navbar-nav ms-auto text-dark">
                  <li class="nav-item">
                    <a id="head-text" class="head-text nav-link active" href="house.php">Welcome, <?php if(isset($_SESSION['admin-name']) && !empty($_SESSION['admin-name'])){
                    echo $_SESSION['admin-name'];
                  } ?></a>
                  </li>
                  <li class="nav-item">
                      <a href="logout.php" class="head-text nav-link btn btn-light text-dark active" style="margin-left: 20px;">Log out</a>
                  </li>
                </ul>
              
                  
                </nav>
                <button class="navbar-toggler ms-2 me-n3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse1" aria-expanded="false">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              
            </div>
          </header>