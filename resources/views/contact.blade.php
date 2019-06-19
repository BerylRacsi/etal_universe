@extends('master')

@section('navbar')

	<div class="container-menu-desktop trans-03 p-t-30">
        <div class="wrap-menu-desktop1">
            @include('navbar')
        </div>  
    </div>

@endsection

@section('content')

<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-pin zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Address
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								Etal Universe Center 8th floor, 379 Hudson St, New York, NY 10018 US
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-whatsapp zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Lets Talk
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								+1 800 1236879
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-email zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Sale Support
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								contact@example.com
							</p>
						</div>
					</div>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-instagram zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Instagram
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								@etaluniverse
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-twitter zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Twitter
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								@etaluniverse
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="cl8 txt-center size-211">
							<i class="zmdi zmdi-facebook-box zmdi-hc-3x"></i>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-106 cl3">
								Facebook
							</span>

							<p class="stext-104 cl6 size-213 p-t-18">
								Etal Universe
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection