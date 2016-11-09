<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <div id="div_brand"><a href="{{ route('home') }}"><img src="{{asset('images/logo.png')}}" id="img_logo"></a></div>
        </div>
		<div class="collapse navbar-collapse">
            @if (Auth::check())
				@if (Auth::user()->isUser())
					<ul class="nav navbar-nav">
						<li><a href="">User page</a></li>
					</ul>
				@else 
					<div class="nav navbar-nav btn-group">
						<div class="btn-group nav_left_group">
							<button type="button" class="btn btn-success dropdown-toggle btn_nav" data-toggle="dropdown" aria-expanded="false">
								Assets <i class="fa fa-bar-chart" aria-hidden="true"></i>
							</button>
							<ul class="dropdown-menu dropdown_menu_clean">
								<li><a href="{{ route('computers') }}" class="btn btn-success">Computers</a></li>
								<li><a href="{{ route('networkprinters') }}" class="btn btn-success">Network Printers</a></li>
								<li><a href="{{ route('peripherals') }}" class="btn btn-success">Peripherals</a></li>
								<li><a href="{{ route('employees') }}" class="btn btn-success">Employees</a></li>
								<li><a href="{{ route('accounts') }}" class="btn btn-success">Accounts</a></li>
								<li><a href="{{ route('authorizations') }}" class="btn btn-success">Authorizations</a></li>
								<li><a href="{{ route('usbtokens') }}" class="btn btn-success">USB tokens</a></li>
								<li><a href="{{ route('personalphones') }}" class="btn btn-success">Personal phones</a></li>
							</ul>
						</div>
						
						<div class="btn-group">
							<button type="button" class="btn btn-success dropdown-toggle btn_nav" data-toggle="dropdown" aria-expanded="false">
								Add new <i class="fa fa-plus-square" aria-hidden="true"></i>
							</button>
							<ul class="dropdown-menu dropdown-menu-right dropdown_menu_clean">
								<li><a href="{{ route('computers.create') }}" class="btn btn-success">Add computer</a></li>
								<li><a href="{{ route('networkprinters.create') }}" class="btn btn-success">Add network printer</a></li>
								<li><a href="{{ route('peripherals.create') }}" class="btn btn-success">Add peripheral</a></li>
								<li><a href="{{ route('employees.create') }}" class="btn btn-success">Add employee</a></li> 
								<li><a href="{{ route('usbtokens.create') }}" class="btn btn-success" style="border-top-right-radius: 0; border-top-left-radius: 0;">Add new USB token</a></li>
							</ul>
						</div>
					</div>
					
					<form class="navbar-form navbar-left" role="search" action="{{ route('search.results') }}">
						<div class="form-group">
							<input type="text" name="query" class="form-control" placeholder="Search for asset">
						</div>
						<div class="btn-group">
							<input type="submit" class="btn btn-success" name="computers" value="Computers">
							<input type="submit" class="btn btn-success" name="employees" value="Employee">
							<button type="button" class="btn btn-success dropdown-toggle" id='carot' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="caret"></span>
							</button>
							  <ul class="dropdown-menu dropdown-menu-right dropdown_menu_clean">
								<li><input type="submit" name="networkprinters" class="btn btn-success btn_nav_dropdown"  value="Network printers"></li>
								<li><input type="submit" name="peripherals" class="btn btn-success btn_nav_dropdown" value="Peripherals"></li>
								<li><input type="submit" name="accounts" class="btn btn-success btn_nav_dropdown" value="Accounts"></li>
								<li><input type="submit" name="usbtokens" class="btn btn-success btn_nav_dropdown" value="USB Tokens"></li>
							  </ul>
						</div>
					</form>
					
				@endif
			@else
				<div class="nav navbar-nav">
					<a href="{{ route('home') }}" class="btn btn-success btn_nav" role='button'>Legislation</a>
					<a href="{{ route('home') }}" class="btn btn-success btn_nav" role='button'>Forms</a>
					<a href="{{ route('home') }}" class="btn btn-success btn_nav" role='button'>Contact</a>
				</div>
            @endif
			
            <div class="nav navbar-nav navbar-right">
                @if (Auth::check())
					<div class="btn-group">
						<button type="button" class="btn btn-default dropdown-toggle btn_nav user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{ Auth::user()->username }} <span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<li><a href="{{ route('profile') }}"><i class="fa fa-btn fa-user"></i> User profile</a></li>
							<li><a href="{{ route('auth.signout') }}"><i class="fa fa-btn fa-sign-out"></i> Sign out</a></li>
						</ul>
					</div>
                @else
					<div class="nav navbar-nav">
						<a href="{{ route('auth.signup') }}" class="btn btn-success btn_nav" role='button'>Sign up</a>
						<a href="{{ route('auth.signin') }}" class="btn btn-success btn_nav" role='button'>Sign in</a>
					</div>
                @endif
            </div>
        </div>
    </div>
</nav>
