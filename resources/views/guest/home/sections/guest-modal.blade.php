<div class="modal fade" id="guest-modal" tabindex="-1" aria-labelledby="guest-modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="guest-modalLabel">Guests</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table" id="item">
                    <thead>
                        <tr>
                            <th class="bg-danger text-center py-3">Room</th>
                            <th class="bg-danger text-center py-3">Guests</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="item-row1">
                            <td class="text-center py-3">Room 1 <input type="hidden" name="rooms[1][room]"
                                    id="room_1" value="1"></td>
                            <td class="text-center py-3">
                                <button type="button" class="btn btn-sm btn-danger" onclick="addGuestinRoom(1)"><i
                                        class="bi bi-plus"></i></button><span class="mx-3"
                                    id="room_1_guest">1</span><input type="hidden" name="rooms[1][guest]"
                                    id="guest_1" class="total_guests" value="1">
                                <button type="button" class="btn btn-sm btn-dark" onclick="removeGuestinRoom(1)"><i
                                        class="bi bi-dash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="text-center"><button type="button" class="btn btn-sm btn-light"
                                    onclick="removeRoom();">Delete Room</button></td>
                            <td class="text-center"><button type="button" class="btn btn-sm btn-dark"
                                    onclick="addItem();" data-toggle="tooltip" title="Add Room"
                                    class="btn btn-secondary" data-original-title="Add Item">Add Room</button></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
