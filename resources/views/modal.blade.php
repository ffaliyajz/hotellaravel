<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">New Hotel Details Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('saveHotel') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Hotel Name:</label>
                        <input type="text" class="form-control" id="name" name="name">
                        <!-- Added name="name" -->
                    </div>
                    <div class="mb-3">
                        <label for="address" class="col-form-label">Hotel Address:</label>
                        <textarea class="form-control" id="address" name="address"></textarea> <!-- Added name="address" -->
                    </div>
                    <div class="mb-3">
                        <label for="img" class="col-form-label">Image:</label>
                        <input type="text" class="form-control" id="img" name="img">
                        <!-- Added name="img" and changed the input type to file for image upload -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Hotel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
