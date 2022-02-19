
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('main/asset/style.css') }}" />
    <title>Katheay Dai | </title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="{{ isset($guard) ? url($guard . '/login') : route('login') }}" method="POST" class="sign-in-form">
            @csrf 
            <h2 class="title">Sign in</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="email" name="email" required=" " />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            <button type="submit" value="Login" class="btn solid">Login</button>
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="{{ url('/auth/redirect/google') }}" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div>
          </form>
          <form method="POST" action="{{ route('register') }}" class="sign-up-form">
            @csrf
            <h2 class="title">Sign up at Katheay Dai</h2>
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="name" name="name" class="form-control" aria-describedby="emailHelp"
              required=" " placeholder="Enter Your Full name" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email" name="email" class="form-control"
              aria-describedby="emailHelp" required=" " placeholder="Enter Your Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input type="text" id="phone" name="phone" class="form-control" aria-describedby="emailHelp"
              required=" " placeholder="Enter Your Phone" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" class="form-control" name="password"
              placeholder="Enter Your Password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password_confirmation" name="password_confirmation"
              class="form-control" placeholder="Re-Type Password" />
            </div>
            <button type="submit" class="btn" value="Sign up">Sign up</button>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="{{ asset('main/asset/img/log.svg') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="{{ asset('main/asset/img/register.svg') }}" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="{{ asset('main/asset/app.js') }}"></script>
  </body>
</html>
