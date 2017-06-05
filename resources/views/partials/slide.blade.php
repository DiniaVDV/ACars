<!-- Carousel
================================================== -->
<div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="row carousel-caption">
                    @for($i = 0; $i < 3; $i++)
                        <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
                            <a href="#">
                                <div class="panel panel-default oneItem">
                                    <div class="panel-heading itemHead">
                                        <h4 class="title">{{$items[$i]->title}}</h4>
                                    </div>
                                    <div class="panel-body">
                                        <img class="itemLogo" src="{{ asset('img/logo_1.jpg') }} ">
                                        <p id="priceMain"><strong>100 грн </strong></p>
                                        <button type="submit" class="btn" id="buyMain">
                                            Купить
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-4 hidden-md hidden-lg itemBasic">
                            <a href="#">
                                <div class="panel panel-default oneItem">
                                    <div class="panel-heading itemHead">
                                        <h4 class="title">2 </h4>
                                    </div>
                                    <div class="panel-body">
                                        <img class="itemLogosmall" src="{{ asset('img/logo_1.jpg') }} ">
                                        <p id="priceMainSmall"><strong>1000 грн </strong></p>
                                        <button type="submit" class="btn" id="buyMainSmall">
                                            Купить
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->




<div id="myCarousel2" class="carousel slide hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-inner" role="listbox">
        <div class="item active">
            <div class="container">
                <div class="row carousel-caption">
                    <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
                        <a href="#">
                            <div class="panel panel-default oneItem">
                                <div class="panel-heading itemHead">
                                    <h4 class="title">1231 khbkjbj</h4>
                                </div>
                                <div class="panel-body">
                                    <img class="itemLogo" src="{{ asset('img/logo_1.jpg') }} ">
                                    <p id="priceMain"><strong>100 грн </strong></p>
                                    <button type="submit" class="btn" id="buyMain">
                                        Купить
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 hidden-md hidden-lg itemBasic">
                        <a href="#">
                            <div class="panel panel-default oneItem">
                                <div class="panel-heading itemHead">
                                    <h4 class="title">1231 </h4>
                                </div>
                                <div class="panel-body">
                                    <img class="itemLogosmall" src="{{ asset('img/logo_1.jpg') }} ">
                                    <p id="priceMainSmall"><strong>1000 грн </strong></p>
                                    <button type="submit" class="btn" id="buyMainSmall">
                                        Купить
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
                        <a href="#">
                            <div class="panel panel-default oneItem">
                                <div class="panel-heading itemHead">
                                    <h4 class="title">1231 khbkjbj</h4>
                                </div>
                                <div class="panel-body">
                                    <img class="itemLogo" src="{{ asset('img/logo_1.jpg') }} ">
                                    <p id="priceMain"><strong>100 грн </strong></p>
                                    <button type="submit" class="btn" id="buyMain">
                                        Купить
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 hidden-md hidden-lg itemBasic">
                        <a href="#">
                            <div class="panel panel-default oneItem">
                                <div class="panel-heading itemHead">
                                    <h4 class="title">1231 </h4>
                                </div>
                                <div class="panel-body">
                                    <img class="itemLogosmall" src="{{ asset('img/logo_1.jpg') }} ">
                                    <p id="priceMainSmall"><strong>1000 грн </strong></p>
                                    <button type="submit" class="btn" id="buyMainSmall">
                                        Купить
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="hidden-sm col-md-4 col-lg-4 itemBasic">
                        <a href="#">
                            <div class="panel panel-default oneItem">
                                <div class="panel-heading itemHead">
                                    <h4 class="title">1231 khbkjbj</h4>
                                </div>
                                <div class="panel-body">
                                    <img class="itemLogo" src="{{ asset('img/logo_1.jpg') }} ">
                                    <p id="priceMain"><strong>100 грн </strong></p>
                                    <button type="submit" class="btn" id="buyMain">
                                        Купить
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-4 hidden-md hidden-lg itemBasic">
                        <a href="#">
                            <div class="panel panel-default oneItem">
                                <div class="panel-heading itemHead">
                                    <h4 class="title">1231 </h4>
                                </div>
                                <div class="panel-body">
                                    <img class="itemLogosmall" src="{{ asset('img/logo_1.jpg') }} ">
                                    <p id="priceMainSmall"><strong>1000 грн </strong></p>
                                    <button type="submit" class="btn" id="buyMainSmall">
                                        Купить
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="item">
            <img class="second-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Second slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>Another example headline.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="item">
            <img class="third-slide" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Third slide">
            <div class="container">
                <div class="carousel-caption">
                    <h1>One more for good measure.</h1>
                    <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
                </div>
            </div>
        </div>
    </div>
    <a class="left carousel-control" href="#myCarousel2" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel2" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div><!-- /.carousel -->
