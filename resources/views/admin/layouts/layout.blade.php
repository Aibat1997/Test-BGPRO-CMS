<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>BGPROCMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon.png">
    <link href="/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <link href="/plugins/c3-master/c3.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="/ckeditor/samples/js/sample.js"></script>
    <link rel="stylesheet" href="/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">

    @yield('css')

</head>

<body class="fix-header fix-sidebar card-no-border">
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">
        @include('admin.layouts.header')
        @include('admin.layouts.left-menu')
        @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="/plugins/jquery/jquery.min.js"></script>
    <script src="/plugins/bootstrap/js/tether.min.js"></script>
    <script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/jquery.slimscroll.js"></script>
    <script src="/js/waves.js"></script>
    <script src="/js/sidebarmenu.js"></script>
    <script src="/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/js/custom.min.js"></script>
    <script src="/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/plugins/d3/d3.min.js"></script>
    <script src="/plugins/c3-master/c3.min.js"></script>
    <script src="/js/dashboard1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <script src="/js/admin.js"></script>
    <script>
        jQuery.each(["put", "delete"], function (i, method) {
            jQuery[method] = function (url, data, callback, type) {
                if (jQuery.isFunction(data)) {
                    type = type || callback;
                    callback = data;
                    data = undefined;
                }

                return jQuery.ajax({
                    url: url,
                    type: method,
                    dataType: type,
                    data: data,
                    success: callback
                });
            };
        });

        function remove(ob, id, model) {
            var answ = confirm("Вы действительно хотите удалить?");
            if (answ) {
                $.delete("/admin/" + model + "/" + id, {
                    _token: '{{csrf_token()}}'
                }, function () {
                    $(ob).closest('tr').remove();
                });
            }
        }
    </script>
    <script>
        initSample();
    </script>

    @yield('js')

</body>

</html>