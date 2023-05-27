<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
    })

    
</script>
@if (session()->has('alert'))
@php
$alert = session()->get('alert');
@endphp
@if ($alert['type'] == 'error')
<script>
    Toast.fire({
        icon: 'error',
        title: "{{$alert['message']}}"
    })

</script>
@elseif ($alert['type'] == 'validation')
<script>
    Toast.fire({
        icon: 'error',
        title: "{{$alert['message']}}"
    })

</script>
@elseif ($alert['type'] == 'success')
<script>
    Toast.fire({
        icon: 'success',
        title: "{{$alert['message']}}"
    })
</script>
@elseif ($alert['type'] == 'warning')
<script>
    Toast.fire({
        icon: 'warning',
        title: "{{$alert['message']}}"
    })
</script>
@elseif ($alert['type'] == 'info')
<script>
    Toast.fire({
        icon: 'info',
        title: "{{$alert['message']}}"
    })
</script>
@endif
@endif
@php
    session()->forget('alert')
@endphp
