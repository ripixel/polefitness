@extends('app')

@section('title')
    News | UoS Pole Fitness Society
@endsection

@section('content')
    <div id="news" class="hero hero-news">
        <div class="block-overlay"></div>
        <div class="container">
            <div class="pure-g hero-content-center center">
                <div class="pure-u-1 hero-title hero-content">
                    <h1 style="font-size: 3.5em">News</h1>
                    <h3>Good news, everyone...!</h3>
                </div>

                <div class="pure-u-1 news-item">
                    <div class="pure-g">
                        <div class="news-image square pure-u-1-4" style="background: url('img/com-3.jpg') no-repeat center center; background-size: cover;">
                            <div class="news-overlay"><a class="button" href="#">Read more</a></div>
                        </div>
                        <div class="news-snippet pure-u-3-4">
                            <h2>What an exciting thing!</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur delectus dolorum eius eos est expedita fugit id illum inventore, magnam maiores minima mollitia nam nisi optio quam saepe similique voluptatibus.</p>
                            <div class="news-details">
                                Posted <strong>today</strong> by <strong>James King</strong>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pure-u-1 news-item">
                    <div class="pure-g">
                        <div class="news-image square pure-u-1-4" style="background: url('img/com-2.jpg') no-repeat center center; background-size: cover;">
                            <div class="news-overlay"><a class="button" href="#">Read more</a></div>
                        </div>
                        <div class="news-snippet pure-u-3-4">
                            <h2>What an exciting thing!</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur delectus dolorum eius eos est expedita fugit id illum inventore, magnam maiores minima mollitia nam nisi optio quam saepe similique voluptatibus.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, harum, recusandae. A doloremque error est facilis ipsum iste labore minus nihil non, nostrum quaerat quis sapiente ullam vel velit voluptatibus!</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci consequatur corporis deleniti, dolores dolorum eligendi harum labore, natus nulla odit optio quibusdam reiciendis rem reprehenderit, voluptates. Amet odio unde ut.</p>
                            <div class="news-details">
                                Posted <strong>yesterday</strong> by <strong>Your Mum</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        function squarify() {
            $('.square').each(function() {
                $(this).height($(this).width());
            })
        }

        function newsSquarify() {
            $('.news-snippet').each(function() {
                var prefHeight = $(this).prev().height();
                var currentHeight = $(this).height();
                if(currentHeight > prefHeight) {
                    $(this).find('.readmore').show();
                }
               $(this).height(prefHeight);
            });
        }

        $(function() {
            squarify();
            newsSquarify();
            readmoreBtns();
        });

    </script>
@endsection