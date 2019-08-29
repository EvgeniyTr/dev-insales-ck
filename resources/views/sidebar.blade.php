<div class="logoCp offset-md-1"></div>
<nav class="navbar-expand-md navbar-light navbar-laravel">
	<div class="container">
        <button type="button" data-toggle="collapseг data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
        	<span class="navbar-toggler-icon"></span>
        </button> 
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
        	<ul class="navbar-nav ml-auto">
                @auth
                    @if ((int) auth()->user()->insalesId === 360290 || (int) auth()->user()->insalesId === 524589)
                        <li>
                            <a href="{{ route('users') }}" class="nav-link">Пользователи</a>
                        </li>
                    @endif
                @endauth
        		<li>
        			<a href="https://cloudkassir.ru/" class="nav-link">{{$titleLinkOnCPSite}}</a>
        		</li>
        		<li>
        			<a href="mailto:{{$supportEmail}}" class="nav-link">{{$titleLinkSupportEmail}}</a>
        		</li>
                <li>
                    <span class="nav-link">{{$insalesPhone}}</span>
                </li>
                <li>
                    <a href="mailto:{{$insalesEmail}}" class="nav-link">{{$insalesEmail}}</a>
                </li>
        	</ul>
        </div>
    </div>
</nav>