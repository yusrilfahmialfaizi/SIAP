
<script type="text/javascript" src="{{asset('assets\bower_components\jquery\js\jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\bower_components\jquery-ui\js\jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\bower_components\popper.js\js\popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\bower_components\bootstrap\js\bootstrap.min.js')}}"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="{{asset('assets\bower_components\jquery-slimscroll\js\jquery.slimscroll.js')}}">
</script>
<!-- modernizr js -->
<script type="text/javascript" src="{{asset('assets\bower_components\modernizr\js\modernizr.js')}}"></script>
<!-- Chart js -->
<script type="text/javascript" src="{{asset('assets\bower_components\chart.js\js\Chart.js')}}"></script>
<!-- amchart js -->
<script src="{{asset('assets\assets\pages\widget\amchart\amcharts.js')}}"></script>
<script src="{{asset('assets\assets\pages\widget\amchart\serial.js')}}"></script>
<script src="{{asset('assets\assets\pages\widget\amchart\light.js')}}"></script>
<script src="{{asset('assets\assets\js\jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\assets\js\SmoothScroll.js')}}"></script>
<script src="{{asset('assets\assets\js\pcoded.min.js')}}"></script>

<!-- knob js -->
<script src="{{asset('assets\assets\pages\chart\knob\jquery.knob.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\assets\pages\chart\knob\knob-custom-chart.js')}}"></script>

<!-- Select 2 js -->
<script type="text/javascript" src="{{asset('assets\bower_components/select2/js/select2.full.min.js')}}"></script>
<!-- Multiselect js -->
<script type="text/javascript"
    src="{{asset('assets\bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js')}}">
</script>
<script type="text/javascript" src="{{asset('assets\bower_components/multiselect/js/jquery.multi-select.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\assets/js/jquery.quicksearch.js')}}"></script>
<!-- sweet alert framework -->
<link rel="stylesheet" type="text/css" href="{{asset('assets/bower_components/sweetalert/css/sweetalert.css')}}">

<!-- sweet alert js -->
<script type="text/javascript" src="{{asset('assets/assets/js/sweetalert.js')}}"></script>
<!-- sweet alert modal.js intialize js -->
<!-- modalEffects js nifty modal window effects -->
<script type="text/javascript" src="{{asset('assets/assets/js/modalEffects.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/assets/js/classie.js')}}"></script>

{{-- <!-- sweet alert js -->
<script type="text/javascript" src="{{asset('assets\bower_components\sweetalert\js\sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\assets\js\modal.js')}}"></script> --}}

<!-- data-table js -->
<script src="{{asset('assets\bower_components\datatables.net\js\jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets\bower_components\datatables.net-buttons\js\dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets\assets\pages\data-table\js\jszip.min.js')}}"></script>
<script src="{{asset('assets\assets\pages\data-table\js\pdfmake.min.js')}}"></script>
<script src="{{asset('assets\assets\pages\data-table\js\vfs_fonts.js')}}"></script>
<script src="{{asset('assets\bower_components\datatables.net-buttons\js\buttons.print.min.js')}}"></script>
<script src="{{asset('assets\bower_components\datatables.net-buttons\js\buttons.html5.min.js')}}"></script>
<script src="{{asset('assets\bower_components\datatables.net-bs4\js\dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets\bower_components\datatables.net-responsive\js\dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets\bower_components\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js')}}">
</script>
<script src="{{asset('assets\assets\pages\data-table\extensions\buttons\js\extension-btns-custom.js')}}"></script>
<script src="{{asset('assets\assets\pages\data-table\js\data-table-custom.js')}}"></script>

<!-- Morris Chart js -->
<script src="{{asset('assets\bower_components\raphael\js\raphael.min.js')}}"></script>
<script src="{{asset('assets\bower_components\morris.js\js\morris.js')}}"></script>

<!-- custom js -->
<script src="{{asset('assets\assets\js\vartical-layout.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\assets\pages\dashboard\custom-dashboard.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/assets/pages/advance-elements/select2-custom.js')}}"></script>
<script type="text/javascript" src="{{asset('assets\assets\js\script.min.js')}}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

<script>
  $(document).ready(function() {
    function showTime() {
        var today         = new Date();
        var curr_date     = today.getDate();
        var curr_month    = today.getMonth();
        var curr_year     = today.getFullYear();
        var curr_hour     = today.getHours();
        var curr_minute   = today.getMinutes();
        var curr_second   = today.getSeconds();
        curr_hour         = checkTime(curr_hour);
        curr_minute       = checkTime(curr_minute);
        curr_second       = checkTime(curr_second);
        var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";

        var n = weekday[today.getDay()];
        document.getElementById('clock').innerHTML  = n + ", " +curr_date + "/"+ curr_month + "/" + curr_year + " " + curr_hour + ":" + curr_minute + ":" + curr_second + " ";
    }
    
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);

    function auto_absent() {
      var today         = new Date();
      var batas_hari    = "18:35:00";
      var curr_hour     = today.getHours();
      var curr_minute   = today.getMinutes();
      var curr_second   = today.getSeconds();
      curr_hour         = checkJam(curr_hour);
      curr_minute       = checkJam(curr_minute);
      curr_second       = checkJam(curr_second);
      var jam           = curr_hour + ":" + curr_minute + ":" + curr_second;
      var weekday = new Array(7);
        weekday[0] = "Sunday";
        weekday[1] = "Monday";
        weekday[2] = "Tuesday";
        weekday[3] = "Wednesday";
        weekday[4] = "Thursday";
        weekday[5] = "Friday";
        weekday[6] = "Saturday";

        var n = weekday[today.getDay()];
      if (jam == batas_hari && n != 'Sunday') {
        $.ajax({
          type: "POST",
          url:"{{ route('ajaxAutoAbsen.post') }}",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                  .attr('content')
          },
          success: function (response) {
            location.reload();
          }
        })
      }
    }
    function checkJam(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(auto_absent, 1000);
  })
</script>