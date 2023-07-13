<!DOCTYPE html>
<html>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	
<script defer src="https://use.fontawesome.com/releases/v5.0.1/js/all.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.transit/0.9.12/jquery.transit.js" integrity="sha256-mkdmXjMvBcpAyyFNCVdbwg4v+ycJho65QLDwVE3ViDs=" crossorigin="anonymous"></script> 
	
  <head>
    <title>Login Page</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
    />
    <style>
      body {
        background-color: #508bfc;
      }
      .header {
        text-align: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        padding: 10px 0;
        background-color: rgba(255, 255, 255, 0.8);
        z-index: 999;
      }
      .header h1 {
        color: #000000;
        font-size: 24px;
        font-weight: bold;
        margin: 0;
      }
      .form-label {
        font-weight: bold;
      }
    </style>
	  
	  <script type="text/javascript" src="login.js"></script>
  </head>
  <body>
    <div class="header">
      <h1>SMART VACCINATION SYSTEM</h1>
    </div>

    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem">
              <div class="card-body p-5 text-center">
                <h3 class="mb-5">Sign in to continue</h3>

                <form method="POST" action="login.php">
                  <div class="mb-3">
                    <label for="nid" class="form-label">NID</label>
                    <div class="input-group">
                      <input
                        type="text"
                        id="nid"
                        class="form-control"
                        placeholder="NID"
                        name="nid"
                        required
                      />
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                      <input
                        type="password"
                        id="password"
                        class="form-control"
                        placeholder="Password"
                        name="password"
                        required
                      />
                    </div>
                  </div>

                  <button class="btn btn-primary btn-lg btn-block" type="submit">
                    Login
                  </button>
                </form>

                <hr class="my-4" />

                <a
                  href="register.php"
                  class="btn btn-success btn-lg btn-block btn-light-green"
                  type="button"
                >
                  Register
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="script.js"></script>
  </body>
</html>
