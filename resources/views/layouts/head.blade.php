<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('css/stripe.css') }}" rel="stylesheet" type="text/css" >

	<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}" type="text/javascript"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/basic.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/stripe.js') }}" type="text/javascript"></script>

	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ACars</title>
	<script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
function listOfCategory(event) {
        event = event || window.event
        var clickedElem = event.target || event.srcElement

        if (!hasClass(clickedElem, 'Expand')) {
                return // клик не там
        }

        // Node, на который кликнули
        var node = clickedElem.parentNode
        if (hasClass(node, 'ExpandLeaf')) {
                return // клик на листе
        }

        // определить новый класс для узла
        var newClass = hasClass(node, 'ExpandOpen') ? 'ExpandClosed' : 'ExpandOpen'
        // заменить текущий класс на newClass
        // регексп находит отдельно стоящий open|close и меняет на newClass
        var re =  /(^|\s)(ExpandOpen|ExpandClosed)(\s|$)/
        node.className = node.className.replace(re, '$1'+newClass+'$3')
}


function hasClass(elem, className) {
        return new RegExp("(^|\\s)"+className+"(\\s|$)").test(elem.className)
}
    </script>
	<style type="text/css">

.Container {
    padding: 0;
    margin: 0;
}

.Container li {
    list-style-type: none;
}


/* indent for all tree children excepts root */
.Node {
    background-image : url('{{asset('img/i.gif')}}');
    background-position : top left;
    background-repeat : repeat-y;
    margin-left: 18px;
    zoom: 1;
}

.IsRoot {
    margin-left: 0;
}


/* left vertical line (grid) for all nodes */
.IsLast {
    background-image: url('{{asset('img/i_half.gif')}}');
    background-repeat : no-repeat;
}

.ExpandOpen .Expand {
    background-image: url('{{asset('img/expand_minus.gif')}}');
}

/* closed is higher priority than open */
.ExpandClosed .Expand {
    background-image: url('{{asset('img/expand_plus.gif')}}');
}

/* highest priority */
.ExpandLeaf .Expand {
    background-image: url('{{asset('img/expand_leaf.gif')}}');
}

.Content {
    min-height: 18px;
    margin-left:18px;
}

* html .Content {
    height: 18px;
}

.Expand {
    width: 18px;
    height: 18px;
    float: left;
}


.ExpandOpen .Container {
        display: block;
}

.ExpandClosed .Container {
        display: none;
}

.ExpandOpen .Expand, .ExpandClosed .Expand {
        cursor: pointer;
}
.ExpandLeaf .Expand {
        cursor: auto;
}

</style>
</head>
<body>