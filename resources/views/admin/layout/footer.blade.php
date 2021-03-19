
</body>
<script>
    function time(){
        var date = new Date();
        var time = date.toLocaleTimeString();
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var day = date.toLocaleDateString('en-US',options);
        document.getElementById('time').innerHTML = time;
        document.getElementById('day').innerHTML = day;
    }
    setInterval(function(){
        time();
    },1000);
</script>
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('plugins/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/validation/jquery.validate.js') }}"></script>
<script src="{{ mix('dist/js/axios.js') }}"></script>
<script src="{{ asset('/plugins/custom.js') }}"></script>
<script src="{{ url('https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js') }}"></script>
<script src="{{ url('https://code.jquery.com/jquery-3.5.1.slim.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>

<script src="{{ asset('js/script.js') }}"></script>
@yield('script')
</html>

