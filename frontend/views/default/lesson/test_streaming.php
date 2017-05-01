<?php
/**
 * Created by PhpStorm.
 * User: bactv
 * Date: 01/05/2017
 * Time: 10:18 CH
 */
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.pubnub.com/pubnub-3.7.14.min.js"></script>
<script src="https://cdn.pubnub.com/webrtc/webrtc.js"></script>
<script src="https://cdn.pubnub.com/webrtc/rtc-controller.js"></script>

<div id="vid-box"></div>
<div id="vid-thumb"></div>

<form name="loginForm" id="login" action="#" onsubmit="return login(this);">
    <input type="text" name="username" id="username" placeholder="Pick a username!" />
    <input type="submit" name="login_submit" value="Log In">
</form>


<form name="callForm" id="call" action="#" onsubmit="return makeCall(this);">
    <input type="text" name="number" placeholder="Enter user to dial!" />
    <input type="submit" value="Call"/>
</form>

<div id="inCall"> <!-- Buttons for in call features -->
    <button id="end" onclick="end()">End</button> <button id="mute" onclick="mute()">Mute</button> <button id="pause" onclick="pause()">Pause</button>
</div>

<script>
    var video_out = document.getElementById("vid-box");
    var vid_thumb = document.getElementById("vid-thumb");
    function login(form) {
        var phone = window.phone = PHONE({
            number        : form.username.value || "Anonymous", // listen on username line else Anonymous
            publish_key   : 'pub-c-06ead2b1-8447-444c-8f82-96c05c970b3f',
            subscribe_key : 'sub-c-c9b86782-2e81-11e7-9a1a-0619f8945a4f',
        });
        var ctrl = window.ctrl = CONTROLLER(phone);
        ctrl.ready(function(){
            form.username.style.background="#55ff5b"; // Turn input green
            form.login_submit.hidden="true";	// Hide login button
            ctrl.addLocalStream(vid_thumb);		// Place local stream in div
        });				// Called when ready to receive call
        ctrl.receive(function(session){
            session.connected(function(session){ video_out.appendChild(session.video); });
            session.ended(function(session) { ctrl.getVideoElement(session.number).remove(); });
        });	// Called on incoming call/call ended
        return false; //prevents form from submitting
    }
    function end(){
        ctrl.hangup();
    }
    function mute(){
        var audio = ctrl.toggleAudio();
        if (!audio) $("#mute").html("Unmute");
        else $("#mute").html("Mute");
    }

    function pause(){
        var video = ctrl.toggleVideo();
        if (!video) $('#pause').html('Unpause');
        else $('#pause').html('Pause');
    }

</script>