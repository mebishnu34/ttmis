<link rel="stylesheet" type="text/css" href="../CSS/email.css">
<div class="fcf-body">

    <div id="fcf-form">
    <h3 class="fcf-h3">Send E-Mail</h3>

    <form id="fcf-form-id" class="fcf-form-class" method="post" action="../Object/mail_processing.php">
                    <label for="Email" class="fcf-label">To</label>
        <div class="fcf-form-group">
            <div class="fcf-input-group">
               <input type="email" id="Email" name="Email" class="fcf-form-control" required>
            </div>
        </div>

        <div class="fcf-form-group">
            <label for="Message" class="fcf-label">Message</label>
            <div class="fcf-input-group">
                <textarea id="Message" name="Message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
            </div>
        </div>

        <div class="fcf-form-group">
            <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Send Message</button>
        </div>

    </form>
    </div>

</div>
