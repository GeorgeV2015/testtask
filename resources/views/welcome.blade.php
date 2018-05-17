@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mt-5 mb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Main page</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus accusantium aliquam amet asperiores autem commodi consectetur corporis delectus distinctio dolor doloremque ducimus, ea facere facilis in incidunt ipsam laboriosam, magnam maxime neque nisi non numquam obcaecati optio pariatur porro quas qui reprehenderit repudiandae similique sint sit, soluta tempore temporibus vero voluptates? A ab adipisci assumenda dicta dolore dolorum ea error eveniet facilis ipsam iure iusto laboriosam minima molestiae, neque nisi nobis non nulla odio porro quia sapiente similique suscipit tempore velit voluptas voluptate. Aliquam at excepturi maxime numquam! Adipisci architecto beatae nobis quia recusandae suscipit velit! Aliquid asperiores atque, aut consequatur cum, doloribus fugit harum minima perspiciatis quas repellat saepe sapiente suscipit vero voluptate. Aliquam, commodi dignissimos distinctio doloribus dolorum eius exercitationem hic in incidunt iusto maxime nam odit quidem repudiandae soluta. Aut blanditiis deleniti deserunt dolor ipsam, nam nostrum odit rem sapiente? Dolores exercitationem inventore laudantium nam qui.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
