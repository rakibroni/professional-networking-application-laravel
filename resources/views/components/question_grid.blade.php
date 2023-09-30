



<style>
    .form-check-input:checked {
        background-color: #ff9721 !important;
        border-color: #ff9721 !important;


    }

</style>

{{-- Hier die SKELETONS AUS REACTIONS MODAL LADEN --}}

<x-reaction_modal />
<div class="modal fade" id="discard_post" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Änderungen verwerfen</h5>
                <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
            </div>
            <div class="modal-body">
                Möchtest Du wirklich alle Änderungen verwerfen?
            </div>
            <div class="modal-footer">
                <button onclick="closeDiscardChangesPostPopUp()" type="button"
                    class="btn btn-outline-warning btn-outline-cura" data-bs-dismiss="modal">Zurück</button>
                <button onclick="discardPost()" type="button" class="btn btn-warning bg-cura">Änderungen
                    verwerfen</button>
            </div>
        </div>
    </div>
</div>





<div class="modal fade CustomFullScreenModal" id="post_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-backdrop="static" style="z-index: 2000000 !important;">
    <div class="modal-dialog modal-dialog-scrollable modal-down modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content _br">
            <style>
                .post_control {
                    position: absolute;
                    top: calc(100% - 120px);
                    left: 10px;
                }

            </style>
            <div class="post_control" style="z-index: 100000000000000">

                <div class="btn float-start post-action-box" id="add_post_img_btn" style="padding-left: 8px !important">
                    <form id="upload_post_image_form" method="post" action={{ route('upload_post_img') }}>
                        @csrf
                        <input type="file" id="upload_post_image" name="upload_post_image"
                            style="position: fixed; top: -100em" onclick="imgId = 'img'"
                            accept="image/png,image/jpg,image/jpeg,/image/heic,/image/heif" />

                        <label id="file-btn pointer-on-hover" for="upload_post_image">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#7F7F7F"
                                class="bi bi-images pointer-on-hover" viewBox="0 0 16 16">
                                <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                                <path
                                    d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                            </svg>
                            <div class="h7 d-inline-block pointer-on-hover ms-1" style="color: #7F7F7F">Bild hinzufügen
                            </div>
                        </label>
                        <button id="upload_post_image_submit" class="d-none" type="submit">
                        </button>
                    </form>
                </div>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Beitrag verfassen</h5>
                <button onclick="openDiscardChangesPostPopUp()" type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close" style="border-color: transparent !important"></button>
            </div>
            <div class="modal-body position-relative px-2 px-sm-3">

                <div class="d-flex justify-content-start">
                    <div class="">
                        <?php Helper::profilePicture('post_profile_pic', '60px;', auth()->user(), '', 'cursor:default !important'); ?>
                    </div>
                    <style>
                    .center-vertical {
                        position: absolute;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        width: 100%;

                    }
                    </style>
                    <div class="
                        w-100 position-relative">
                        <div class="center-vertical">
                            <div class="viewerpostbox ms-3 d-inline-block px-2 me-2">
                                <div class="unselectable" style="font-size:12px;">
                                    {{ auth()->user()->firstname . ' ' . auth()->user()->name }}
                                    <!--<svg xmlns="http://www.w3.org/2000/svg" width="14"
                                                                                                                                      height="14" fill="currentColor" class="ms-1 mb-1 bi bi-caret-down-fill" viewBox="0 0 16 16">
                                                                                                                                      <path
                                                                                                                                        d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                                                                                                    </svg>-->
                                </div>
                            </div>
                            <div class="viewerpostbox d-inline-block px-2">
                                <div class="unselectable" style="font-size:12px;"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                        class="unselectable bi bi-globe me-1 self-align-center" viewBox="0 0 16 16">
                                        <path
                                            d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z" />
                                    </svg><span class="unselectable">Jeder</span>
                                    <!--<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor"
                                                                                                                                    class="bi bi-care
                                                                                                                                    t-down-fill ms-3 mb-1" viewBox="0 0 16 16">
                                                                                                                                    <path
                                                                                                                                      d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                                                                                                                  </svg>-->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                @auth

                    <div class="mb-4">

                        <div class="form-floating">

                            <style>
                                .delete_post_img {
                                    position: absolute;
                                    top: 10px;
                                    left: calc(100% - 40px);
                                    background-color: #f2f2f2;
                                    border-radius: 50%;
                                    width: 30px;
                                    height: 30px;
                                }

                            </style>
                            <form action="{{ route('feed') }}" method="post" id="post_form" class="mt-0">
                                @csrf


                                <textarea oninput="auto_grow(this, 0)" name="body" id="post_body" type="text" cols="20"
                                    placeholder="Was möchtest du mit der Community teilen?" class="curaInput mt-3"
                                    style="min-height:100px ;max-height: 200px"></textarea>
                                <button id="submit_post" class="d-none" type="submit"></button>
                            </form>

                            <div class="text-danger h7" id="post_error_messages">
                                <div class="invisible">.</div>
                            </div>
                            <div class="invisible p-2"></div>

                            <div class="position-relative d-none" id="post_img_parent">
                                <div id="post_img" src="" alt=""
                                    style="background-image: none; width:100%; border-radius: 4px">
                                    <img src="" id="post_img_inner" alt="" style="width:100%; ">
                                </div>
                                <form id="delete_post_image_form" method="post" action={{ route('delete_post_image') }}>
                                    @csrf
                                    <div class="delete_post_img pointer-on-hover" onclick="deletePostImage()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                            class="bi bi-x" viewBox="0 0 16 16">
                                            <path
                                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </div>
                                    <button id="submit_delete_post_image" class="d-none" type="submit">
                                </form>

                            </div>
                        </div>






                    </div>



                </div>

            @endauth

            <div class="modal-footer">
                <button onclick="openDiscardChangesPostPopUp()" type="button"
                    class="btn btn-outline-warning btn-outline-cura" data-bs-dismiss="modal">Abbrechen</button>
                <button id="submit_post_btn" type="submit" class="btn btn-warning bg-cura" onclick="post()">Beitrag
                    verfassen</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Frage Modal -->
<div class="modal fade CustomFullScreenModal" id="frage_modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true" data-bs-backdrop="static" style="z-index: 2000000 !important;">
    <div class="modal-dialog modal-dialog-scrollable modal-down modal-dialog-centered modal-fullscreen-xl-down">
        <div class="modal-content _br">


            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Stelle einem Experten deine Frage</h5>
                <button onclick="openDiscardChangesPostPopUp()" type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close" style="border-color: transparent !important"></button>
            </div>

            <div class="modal-body position-relative px-2 px-sm-3">
                 
                <p class="font-weight-lighter">Diese Frage wird anonym gestellt und es wird nicht zu sehen sein, dass du diese gestellt hast.<p>
                {{-- model body start --}}

                <form action="{{ route('question') }}" method="post" id="question_form"
                class="mt-0">
                @csrf
                <div class="col-12 px-1">

                    <div id="skill_preview">
                    </div>
                    {{-- start multiselect --}}

                    <style>
                        .delete-badge {
                            position: absolute;
                            top: -10px;
                            float: right;
                            left: calc(100% - 10px);
                            height: 20px;
                            width: 20px;
                            background-image: url("/images/CloseModalIcon.svg");
                            background-repeat: no-repeat;
                            z-index: 40;
                        }

                        .example-box-style {
                            height: 23px;
                            background: #FFFFFF;
                            border: 2px solid #FF9721;
                            box-sizing: border-box;
                            border-radius: 5px;
                            color: #FF9721;
                            font-weight: 500;
                            font-size: 14px;
                            line-height: 139.19%;
                        }

                    </style>
                   
                     
                    <div class="InPutTitle px-1">Thema der Frage</div>
                    {{-- @foreach ($question_categories as $key => $value)
                           {{$key}} - {{$value}}
                           @endforeach --}}
                    <?php
 


                    $uuid = '0';
                    $id = 'input' . $uuid;
                    $dropdownId = $id . '_dropdown';
                    $placeholder = 'Weiterbildungen';
                    $value = '';
                    $onclick = '$("#' . $dropdownId . '").addClass("d-block")';
                    $onkeyup = 'filterInput("' . $id . '", "' . $dropdownId . '")';
                    $cssStylesArray = ['width: 231px', 'width: 231px; max-height: 200px; overflow-x: hidden;', ''];
                    $cssClassesArray = ['input-box form-control', 'dropdown-menu position-relative', 'dropdown-item pointer-on-hover'];
                    $dropdownContentArray = $list;
                    $category = 'question';
                    ?>
                    <x-multi_select_input :id="$id" :category="$category" :dropdownId="$dropdownId"
                        :placeholder="$placeholder" :value="$value" :onclick="$onclick" :onkeyup="$onkeyup"
                        :cssStylesArray="$cssStylesArray" :cssClassesArray="$cssClassesArray"
                        :dropdownContentArray="$dropdownContentArray" />



                    {{-- end multiselect --}}
                </div>


                


                <div class="col-12 px-1">
                    <div class="smalletext mt-2 col-12">
                        <div id="ember579">
                            <label for="position-description"
                                class="pe-form-field__label label-text InPutTitle">Fragetitel
                            </label>
                        </div>
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <input class="mt-1  form-control" id="" name="title" autocomplete="off"
                            placeholder="z.B. Fachhochschule der Diakonie gGmbH" type="text">
                    </div>

                    <span id="title_error" class="text-danger error-text"> </span>
                </div>


                <div class="col-12 px-1">
                    <div class="smalletext mt-2 col-12">
                        <div id="ember579">
                            <label for="position-description"
                                class="pe-form-field__label label-text InPutTitle">Beschreibung
                            </label>
                        </div>
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <textarea class="form-control" id="job_description0add" name="description"
                            placeholder="Hier kannst du deine Stelle beschreiben: Du kannst deinen Fachbereich, deine täglichen Aufgaben und mögliche Besonderheiten eintragen."
                            rows="5" spellcheck="false"></textarea>
                    </div>

                    <span id="description_error" class="text-danger error-text"> </span>
                </div>
                <div class="col-12 px-1">
                    <div class="smalletext mt-2 col-12">
                        <div id="ember579">
                            <label for="position-description"
                                class="pe-form-field__label label-text InPutTitle">Meine Frage stellen an:
                            </label>
                        </div>
                    </div>

                    <div class="form-group mt-1 mb-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="EXPT" name="question_for"
                                id="question_for1">
                            <label class="form-check-label" for="question_for1">
                                passende Experten.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="COM" type="radio" name="question_for"
                                id="question_for2" checked>
                            <label class="form-check-label" for="question_for2">
                                die gesamte Community.
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" value="BEIDE" type="radio" name="question_for"
                                id="question_for3" checked>
                            <label class="form-check-label" for="question_for3">
                                Beide
                            </label>
                        </div>
                    </div>

                    <span id="description_error0add" class="d-none text-danger error-text">Bitte gebe deinen aktuellen
                        Standort
                        an</span>
                </div>




                 <button id="submit_question" class="d-none" type="submit">
            </form>

                {{-- model body end --}}
            </div>


            <div class="modal-footer">
                <button onclick="openDiscardChangesPostPopUp()" type="button"
                    class="btn btn-outline-warning btn-outline-cura" data-bs-dismiss="modal">Abbrechen</button>
                <button id="submit_question_btn" type="submit" class="btn btn-warning bg-cura"
                    onclick="question()">Anonym Frage
                    stellen</button>
            </div>

        </div>
    </div>
</div>

<!-- Frage Modal End -->
<style>
    .dropdown-hover:hover .dropdown-menu-hover {
        display: block !important;
    }

    .dropdown-menu-hover {
        margin-top: 0 !important;
    }

    .dropdown-item:active {
        background-color: #ff9721 !important;
    }

    .offcanvas {
        transition: transform 0s ease-in-out;
    }

</style>


<div id="question_grid" class="d-none">

    <div class="row">
        <div class="cura-col-2 pe-2 d-xl-block d-none">
            <div class="sticky-top " id="sticky_side_bar" style="z-index: 1;">
                {{-- CONTENT --}}
                <x-user_stats />
                <?php $sideLinksID = 'side_links_0'; ?>
                <x-side_links :sideLinksID="$sideLinksID" />
            </div>
        </div>
        <div class="cura-col-7 marginttopmobile" style=" background:#F6F6F6; border-radius:5px;padding-top:-10px">

            <style>
                .post-box {
                    background: #FFFFFF;

                    border-radius: 5px;
                }


                .cover-box2 {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    width: 100%;
                    border-radius: 5px;
                    background-color: rgba(255, 255, 255, 0.8);
                }

            </style>








            {{-- <div class="FeedPostBar d-xl-block d-none bg-white ms-lg-3" style="margin-top: 14px;">
        <div class="d-flex justify-content-start">


          <div class="position-relative" style="width: 100vw">
            <div class="center-vertical">
              <!-- INput leeren -->
              <div class="postbox" data-bs-toggle="modal" data-bs-target="#post_modal"
                stlye="box-shadow: none !important; outline: none !important" onclick="clearPostInput()">
                <div id="asdasd" onmouseleave="removeDeleteAnim(this.id, 0)" style="width: 250px"
                  onmouseenter="addDeleteAnim(this.id, 1.03, 4)" class="unselectable">Was gibt es Neues,
                  {{ auth()->user()->firstname }}?
        </div>
    </div>
    <div class="FeedQuestionButton">
        <div class="row pt-1 text-center QuestionMark">
            <div class="text-center">?</div>
        </div>
        <div class="row AskSomeThing">Frage etwas</div>
    </div>
</div>
</div>

</div>
</div>
<hr class="m-3 d-none d-xl-block" style="color: #A8A8A8"> --}}

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <select id="select2insidemodal" multiple="multiple">
                                <option value="AL">Alabama</option>
                                ...
                                <option value="WY">Wyoming</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>





            <div style="min-height: 100vh">

                <script>
                    function toggleDarkMode() {
                        var elems = document.body.getElementsByTagName("*"),
                            oldColor = "rgb(255, 255, 255)",
                            newColor = "rgb(0, 0, 0)";

                        function getValue(elem, property) {
                            return window.getComputedStyle(elem, null)
                                .getPropertyValue(property);
                        }

                        Array.prototype.forEach.call(elems, function(elem) {

                            var backgroundColor = getValue(elem, "background-color"),
                                borderColor = getValue(elem, "border-color"),
                                color = getValue(elem, "color");


                            if (backgroundColor == oldColor) {

                                elem.style.cssText += "background-color:" + newColor + "!important;";
                                elem.style.cssText += "background:" + newColor + "!important;";
                            }

                            if (borderColor == oldColor) {

                                //elem.style.cssText = += "border-color:"+newColor+"!important;";
                            }

                            if (color == oldColor) {
                                //elem.style.cssText  += "color:"+newColor+"!important;";
                            }
                        });
                    }
                </script>





                <div class="px-0 px-sm-3 w-100" style="margin-top: 19px">
                    <div class="row ">
                       
                    </div>

                </div>

                <div class="col-12 text-center" id="posts_spinner" style="display: none;">
                    <div class="spinner-border text-warning text-center border-color-cura"
                        style="border-top-color: transparent; border-width: 2px" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div id="spinner-placeholder" style="height: 100vh; display: none;"></div>
                </div>


                {{-- <div id="posts_skeleton" class="" style=" margin-top: 19px">
                    <x-post_skeleton />
                    <x-post_skeleton />
                    <x-post_skeleton />
                    <x-post_skeleton />
                    <x-post_skeleton />
                    <x-post_skeleton />
                </div> --}}
                 
         
        
                <div class="div" id="loaded_question">
                </div>
                 

 
        </div>
    </div>
    <?php $id = 'feed';
    $sideBarId = '0'; ?>
      
     <x-question_right_side /> 

</div>
</div>
 