<form method="post" enctype="multipart/form-data" class="form-container">
    <div class="form-section">
        <article>
            <label for="Title">Day</label><br>
            <fieldset class="fieldset" name="days" required>
                <div>
                    <input type="radio" class="day" name="day" value="Monday" required>
                    <label for="monday">Monday</label>
                </div>
                <div>
                    <input type="radio" class="day" name="day" value="Tuesday" required>
                    <label for="tuesday">Tuesday</label>
                </div>
                <div>
                    <input type="radio" class="day" name="day" value="Wednesday" required>
                    <label for="wednesday">Wednesday</label>
                </div>
                <div>
                    <input type="radio" class="day" name="day" value="Thursday" required>
                    <label for="thursay">Thursday</label>
                </div>
                <div>
                    <input type="radio" class="day" name="day" value="Friday" required>
                    <label for="friday">Friday</label>
                </div>
                <div>
                    <input type="radio" class="day" name="day" value="Saturday" required>
                    <label for="saturday">Saturday</label>
                </div>
                <div>
                    <input type="radio" class="day" name="day" value="Sunday" required>
                    <label for="sunday">Sunday</label>
                </div>
            </fieldset>
        </article>
    </div>

    <div class="form-section">
        <article>
            <label for="open">Status</label><br>
            <fieldset class="fieldset" name="status" id="status" required>
                <div>
                    <input type="radio" class="statu" id="open" name="statu" value="Open" required>
                    <label for="open">Open</label>
                </div>
                <div>
                    <input type="radio" class="statu" id="closed" name="statu" value="Closed" required>
                    <label for="closed">Closed</label>
                </div>
            </fieldset>
        </article>
    </div>

    <div class="form-section" id="hours-section">
        <article>
            <label for="opening_hours">Opening hours</label><br>
            <input name="hours" id="opening_hours">
        </article>
    </div>

    <div class="form-section">
        <article>
            <input type="submit" id="edit" name="edit" class="submit-button" value="Edit">
        </article>
    </div>
</form>
