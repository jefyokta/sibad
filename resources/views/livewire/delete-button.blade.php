<div>
    <button wire:click="confirmDelete">
        <svg class="w-6 h-6 text-red-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
            <path fill-rule="evenodd"
                d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                clip-rule="evenodd" />
        </svg>
    </button>

    <script>
        Livewire.on('swal:confirmDelete', (id, model, message = null) => {


            Swal.fire({
                title: 'Kamu Yakin?',
                text: message || "Konfirmasi hapus item ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'hapus!',
                cancelButtonText: 'batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    @this.call('delete', id, model);
                }
            });
        });
    </script>
</div>
