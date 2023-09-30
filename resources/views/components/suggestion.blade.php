<div class="col-6 col-md-4 col-lg-3 p-2">
    <div class="pt-2 border text-center position-relative" style="border-radius: 5px !important">
        <div class="">
            <?php Helper::profilePicture('', '90px', $suggestion, 'mt-1 mb-2', '') ?>
        </div>

        <div class="mt-2 px-2 SuggestionNameFont HideOverflowText" onclick="loadUserProfileCard('{{ $suggestion->username }}')"><span class="underline-on-hover">{{ $suggestion->fullName() }}</span></div>

        <div class="SuggestionStelleAGFont HideOverflowText3 px-2 my-2" onclick="loadUserProfileCard('{{ $suggestion->username }}')" style="height: 29.33px;">
            <span class="pointer-on-hover" style="width: 100% !important; white-space: pre-wrap; overflow-wrap: break-word; box-sizing:border-box;">{{ $suggestion->current_position }}{{ $suggestion->currentEmployer(array('')) }}</span>
        </div>
        <div class="mb-3 px-2 SuggestionCommonFriendsFont HideOverflowText">
            <span class="">{!! $suggestion->connectionsInCommonString() !!}</span>
        </div>
        <div id="btn_{{ $suggestion->username }}" onclick="requestConnection('{{ $suggestion->username }}')" class="pointer-on-hover border-top rounded-bottom mt-2 py-1" style="background-color: #ff9721; color: #ffffff">
            <img class="align-self-center me-2" style="margin-bottom: 2px; width: 20px; height:18px" src="/images/VernetzenIcon.svg" alt=""><span id="btn_value{{ $suggestion->username }}" class="align-self-center" style="font-size: 14px">Vernetzen</span>
        </div>
    </div>
</div>

<!--
<div class="col-4 p-2 d-none d-xl-none d-md-block">
    <div class="pt-2 border rounded text-center position-relative">
        <div class="">
            <?php Helper::profilePicture('', '90px', $suggestion, '', '') ?>
        </div>

        <div class="SuggestionNameFont">{{ $suggestion->firstname." ".$suggestion->name }}</div>

        <div class="SuggestionStelleAGFont">
            Stationsleiter/in @ Evangelisches Johanneswerk
        </div>
        <div class="my-3 text-decoration-underline SuggestionCommonFriendsFont">
            38 gemeinsame Freunde
        </div>
        <div id="btn_1{{ $suggestion->username }}" onclick="requestConnection('{{ $suggestion->username }}')" class="pointer-on-hover border-top rounded-bottom mt-2 py-1" style="background-color: #ff9721; color: #ffffff">
            <span id="btn_value1{{ $suggestion->username }}">Vernetzen</span>
        </div>
    </div>
</div>

<div class="col-6 p-2 d-md-none d-sm-block">
    <div class="pt-2 border rounded text-center position-relative">
        <div class="">
            <?php Helper::profilePicture('', '90px', $suggestion, '', '') ?>
        </div>

        <div class="SuggestionNameFont">{{ $suggestion->firstname." ".$suggestion->name }}</div>

        <div class="SuggestionStelleAGFont">
            Stationsleiter/in @ Evangelisches Johanneswerk
        </div>
        <div class="my-3 text-decoration-underline SuggestionCommonFriendsFont">
            38 gemeinsame Freunde
        </div>
        <div id="btn_2{{ $suggestion->username }}" onclick="requestConnection('{{ $suggestion->username }}')" class="pointer-on-hover border-top rounded-bottom mt-2 py-1" style="background-color: #ff9721; color: #ffffff">
            <span id="btn_value2{{ $suggestion->username }}">Vernetzen</span>
        </div>
    </div>
</div>
-->