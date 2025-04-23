@if(Session::has('success'))
<div class="fixed right-4 top-4 bg-green-600 px-6 py-4 text-xl text-white font-bold rounded-lg shadow-lg border border-gray-200 flex items-center gap-3" id="myalert">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
    </svg>
    <p>{{ session('success') }}</p>
</div>

<script>
    setTimeout(() => {
        document.getElementById('myalert').style.display = 'none';
    }, 3000);
</script>
@endif