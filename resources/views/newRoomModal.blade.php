<!-- Add New Room Modal for each hotel -->

<div class="modal fade" id="addNewRoom{{$hotel->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewRoom{{$hotel->id}}">Add New Room</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('saveRoom', ['hotel_id' => $hotel->id]) }}" method="POST">
                    @csrf
                    <!-- Add your form fields for creating a new room here -->
                    <div class="form-group">
                        <label for="room_name">Room Name</label>
                        <input type="text" class="form-control" id="room_name" name="room_name" required>
                    </div>

                    <div class="form-group">
                        <label for="room_type">Room Type</label>
                        <select class="form-select" id="room_type" name="room_type" required>
                            <option value="Single">Single</option>
                            <option value="Double">Double</option>
                            <option value="Suite">Suite</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price_per_night">Price per Night</label>
                        <input type="number" class="form-control" id="price_per_night" name="price_per_night" required>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="col-form-label">Image:</label>
                        <input type="text" class="form-control" id="room_img" name="room_img"> <!-- Added name="img" and changed the input type to file for image upload -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Room</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>