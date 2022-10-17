/*================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 5.0
	Author: PIXINVENT
	Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================

NOTE:
------
PLACE HERE YOUR OWN JS CODES AND IF NEEDED.
WE WILL RELEASE FUTURE UPDATES SO IN ORDER TO NOT OVERWRITE YOUR CUSTOM SCRIPT IT'S BETTER LIKE THIS. */


/*-------------------------------
    Delete Confirmation Alert
  -----------------------------------*/
  $('.delete-confirm').on('click', function(event) {
    const id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to delete this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('delete_form_' + id).submit();
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your Data is Save :)',
                'error'
            )
        }
    })
});

/*-------------------------------
    Approved Artist Confirmation Alert
  -----------------------------------*/
  $('.approved-artist-confirm').on('click', function(event) {
    const id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to approved this Artist!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approved it!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('approved_artist_form_' + id).submit();
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your Data is Save :)',
                'error'
            )
        }
    })
});

/*-------------------------------
    Approved Curator Confirmation Alert
  -----------------------------------*/
  $('.approved-curator-confirm').on('click', function(event) {
    const id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to approved this Curator!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, approved it!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('approved_curator_form_' + id).submit();
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your Data is Save :)',
                'error'
            )
        }
    })
});


/*-------------------------------
    Verified Curator Confirmation Alert
  -----------------------------------*/
  $('.verified-curator-confirm').on('click', function(event) {
    const id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to verified this Curator!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, verified it!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('verified_curator_form_' + id).submit();
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your Data is Save :)',
                'error'
            )
        }
    })
});



/*-------------------------------
    Rejected Curator Confirmation Alert
  -----------------------------------*/
  $('.rejected-curator-confirm').on('click', function(event) {
    const id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to rejected this Curator!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, rejected it!'
    }).then((result) => {
        if (result.value) {
            event.preventDefault();
            document.getElementById('rejected_curator_form_' + id).submit();
        } else if (
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your Data is Save :)',
                'error'
            )
        }
    })
});
