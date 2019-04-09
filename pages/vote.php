<?php require 'header.php'; ?>
<script src="../public/plugin/jquery.1.11.js"></script>
<script src="../public/plugin/app.js"></script>

<script>
         $(function() {
          $('#start-camera').on('click', function() {
            let ml = new MLModule;
          });
        })

</script>
<div class="container">
    <div style="margin-left:20px;">
     <h3>Cast your vote</h3>
     <hr>
    </div>

    
    <div class="col-md-3">

        <?php require 'sidebar.php'; ?>
    </div>
    <div class="col-md-8"> 
                <label for="">Election Type</label>
                <select name="type" class="form-control" id="type">
                    <option value="">select</option>
                    <?php if (count($data['type']) > 0): ?>
                        <?php foreach ($data['type'] as $party): ?>
                            <option value="<?php echo $party['title']?>"><?php echo $party['title']?></option>
                        <?php endforeach ?>
                    <?php endif ?>
                </select>
                <br>
                <label for="">Political Party</label>
                <select name="party" id="party" class="form-control">
                    <option value="">select</option>
                </select>
                <br>
                <button id="cast-vote">Submit</button>
                <video style="width: 700px;border:6px solid #333" autoplay="" id="video"></video>
                <audio id="audio" src="/plugin/shot.mp3" autoplay="false"></audio>
                <div >
                    <canvas id="canvas" style="display:none;" width="700" height="528"></canvas>
                   <div id="image-preview"></div>
                   <!-- style="width: 100px;max-width:100%;border:3px solid #333"> -->
                 </div>
                 <button id="start-camera" class="btn btn-info btn-lg">Start Camera</button>
                <button id="take-picture" class="btn btn-primary btn-lg">Take Picture</button>
                <button id="http-click">Save</button>
        
    </div>
   
</div>

<script>
$(function() {
    $('#type').change(function() {
        const type = $(this).val();
        const data = { type: type};
        $.post('index.php?rel=home&method=ajax', data)
        .done(function(resp) {
            const json = JSON.parse(resp);
            if (json.length > 0) {
                let elem = '';
                json.forEach(function(value) {
                    elem += `<option value="${value.party}-${value.candidate}">${value.party}-${value.candidate}</option>`;
                })
                $('#party').html(elem)
            } else {
                alert("Unable to get information or information not available")
            }
        })
        .fail(function(err) {
            alert("Error occured, please reload the page")
        })
    })

    $('#cast-vote').click(function() {
        const type = $('#type');
        const party = $('#party');

        if (type.val() != '' && party.val() != '') {
            const data = { election_type: type.val(), party: party.val()};
            $.post('index.php?rel=home&method=castVote', data)
            .done(function(resp) {
                const json = JSON.parse(resp);
                if (json.status == 'exist') {
                    alert("You've already casted the vote for this election")
                } else {
                    alert("Vote Casted successfully");
                    window.location = 'index.php?rel=home&method=dashboard';
                }
            })
        }
    })
})
</script>
<?php require 'footer.php'; ?>