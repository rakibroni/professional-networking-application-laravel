<div>
  <div class="d-flex align-items-start px-2 py-1 mt-2">
    <a role="button"  class="flex-0 answer-avatar ps-2"  onclick="loadTalentPage('{{ $talent->uuid }}')">
      <img src="{{ asset($talent->profile_pic) }}" style="width: 40px; height: 40px; border-radius: 50%;" alt="">
    </a>
    <!-- username + last message -->
    <div class="ms-3 w-100">
      <div class="d-flex justify-content-between w-100">
        <div>{{ $talent->firstname . ' ' . $talent->lastname }}</div>
        <div>...</div>
      </div>
      <div style="font-size: 12px">
        Eingeladen {{ ' ' .
            $talent->invitation()->created_at->locale('de_DE')->shortRelativeDiffForHumans() }}
      </div>
    </div>
  </div>
</div>
<style>

</style>
<hr class="m-0 p-0">
<div class="h-100 position-relative ">
  <div class="d-flex align-items-end " style="height:460px"  >
    <div id ="messages">






    </div>
  </div>

</div>
<div class="chat-actions mt-auto d-flex align-items-end px-2">

  <div class="ms-1 flex-1 w-100">
    <textarea id="message_input" class="form-control text-break" role="textbox" aria-placeholder="Schreiben..."
      contenteditable name="message-box" aria-label="Schreiben..." style="height: 38px; max-height: 70px"></textarea>
  </div>
  <button id="job_chat_send_btn" class="mx-1 btn-primary btn jobs-bg w-100" style="width: 100px !important" onclick=" sendMessageToTalent()"
    style="font-size: 12px !important">Senden</button>
</div>
</div>
