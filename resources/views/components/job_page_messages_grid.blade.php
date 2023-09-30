<div id="messages_grid" class="d-none" >
  <div id="messages-page" class="row bg-white" >
    <div class="row" >
        <div class="col">
            <div class="container-fluid">
                <div class="messages-box row border radius-5px">
                    <!-- Chats menu -->
                    <div class="col-12 col-md-4 border-end h-100">
                        <!-- User Image + Username + Create Chat Icon  -->
                        <div class="
                d-flex
                align-items-center
                border-bottom
                px-2
                py-3 py-md-2
              ">
                           {{--   <div class="flex-0">
                                <!-- Big Screens -->
                                <a href="#" class="rounded-pill answer-avatar ps-2 d-none d-md-block">
                                    <img class="radius-50" loading="lazy" src="../../assets/images/default.png"
                                        alt="username" width="45" height="45" />
                                </a>
                                <!-- Else -->
                                <!-- back Arrow -->
                                <a role="button" class="d-md-none">
                                    <svg width="19" height="17" viewBox="0 0 19 17" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.858 7.16635C17.7802 7.15373 17.7015 7.14791 17.6228 7.14893H4.2187L4.51098 7.01299C4.79668 6.87776 5.05659 6.69373 5.27907 6.46921L9.03792 2.71036C9.53297 2.23778 9.61615 1.47756 9.23504 0.909101C8.79148 0.303343 7.94085 0.171817 7.33505 0.615377C7.28611 0.651232 7.23959 0.690316 7.19588 0.732374L0.398679 7.52957C-0.132523 8.06018 -0.13299 8.92092 0.397616 9.45212C0.397956 9.45246 0.398339 9.45284 0.398679 9.45318L7.19588 16.2504C7.7275 16.7805 8.58824 16.7793 9.11842 16.2477C9.16014 16.2059 9.1991 16.1613 9.23504 16.1144C9.61615 15.546 9.53297 14.7858 9.03792 14.3132L5.28587 10.5475C5.08641 10.3479 4.85709 10.1804 4.60615 10.0513L4.19831 9.86781H17.548C18.2425 9.8936 18.8518 9.40849 18.9822 8.72588C19.1024 7.98477 18.5991 7.28657 17.858 7.16635Z"
                                            fill="#636466" />
                                    </svg>
                                </a>
                            </div>
--}}
                            <div class="flex-1 ms-3 text-center w-100">
                                <h5 class="font-size-18 font-weight-500 mb-0 w-100 text-center ">
                                    Nachrichten
                                </h5>
                            </div>


{{--  

                            <div class="flex-0 me-2">
                                <!-- New-msg Icon -->
                                <a role="button" data-target="new-chat" class="d-none d-md-block">
                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.8808 14.562L0.881744 20.7049L7.07883 18.7233L2.8808 14.562Z"
                                            fill="#636466" />
                                        <path
                                            d="M14.8812 2.6066L3.53862 13.8782L7.77352 18.0866L19.1161 6.81499L14.8812 2.6066Z"
                                            fill="#636466" />
                                        <path
                                            d="M20.572 3.96083L17.7733 1.18664C17.3735 0.790326 16.7738 0.790326 16.3739 1.18664L15.4744 2.07834L19.6724 6.23963L20.572 5.34793C20.9718 4.95161 20.9718 4.35714 20.572 3.96083Z"
                                            fill="#636466" />
                                    </svg>
                                </a>
                                <!-- New-msg Icon For small-screens -->
                                <a role="button" data-target="new-chat" class="new-msg d-md-none">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="35.5833" cy="34.4167" r="32.0833" fill="black"
                                            fill-opacity="0.25" />
                                        <path d="M22.75 41.125L19.8333 50.1667L28.875 47.25L22.75 41.125Z"
                                            fill="white" />
                                        <path
                                            d="M40.2815 23.547L23.7101 40.1183L29.8973 46.3054L46.4686 29.7341L40.2815 23.547Z"
                                            fill="white" />
                                        <path
                                            d="M48.5625 25.5208L44.4791 21.4375C43.8958 20.8542 43.0208 20.8542 42.4374 21.4375L41.1249 22.75L47.25 28.875L48.5625 27.5625C49.1458 26.9792 49.1458 26.1042 48.5625 25.5208Z"
                                            fill="white" />
                                        <path
                                            d="M35 0C15.6998 0 0 15.6998 0 35C0 54.3002 15.6998 70 35 70C54.3002 70 70 54.2974 70 35C70 15.7026 54.3002 0 35 0ZM35 64.5779C18.6929 64.5779 5.42213 51.3099 5.42213 35C5.42213 18.6901 18.6929 5.42213 35 5.42213C51.3071 5.42213 64.5779 18.6901 64.5779 35C64.5779 51.3099 51.3099 64.5779 35 64.5779Z"
                                            fill="white" />
                                    </svg>
                                </a>
                                <!-- Three Dots Icon -->
                                <a role="button" class="d-md-none">
                                    <svg width="21" height="5" viewBox="0 0 21 5" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="2.25" cy="2.25" r="2.25" fill="#636466" />
                                        <circle cx="10.25" cy="2.25" r="2.25" fill="#636466" />
                                        <circle cx="18.25" cy="2.25" r="2.25" fill="#636466" />
                                    </svg>
                                </a>
                            </div>--}}
                        </div>
                        <!-- Box Search  -->
                        <div class="p-2">
                            <div class="search-box input-group flex-nowrap px-1">
                                <span class="s-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.7222 10.2356C14.8026 7.3806 14.1068 3.42722 11.1691 1.40585C8.23138 -0.615515 4.16354 0.0602064 2.08365 2.91572C0.00375247 5.77075 0.699038 9.72364 3.63723 11.745C5.73402 13.1877 8.50622 13.2988 10.7178 12.0295L15.5232 16.6716C16.042 17.2025 16.9053 17.2237 17.4515 16.7195C17.9977 16.2157 18.0196 15.3767 17.5012 14.8459C17.4848 14.829 17.4689 14.8135 17.4515 14.7976L12.7222 10.2356ZM7.39893 10.6684C5.0775 10.6689 3.19541 8.8412 3.19392 6.58509C3.19342 4.32899 5.07402 2.49985 7.39595 2.49889C9.71439 2.49792 11.5955 4.32271 11.6 6.57591C11.6039 8.8325 9.72433 10.6645 7.40191 10.6684C7.40092 10.6684 7.40042 10.6684 7.39893 10.6684Z"
                                            fill="#7F7F7F" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" placeholder="Nachrichten durchsuchen.."
                                    aria-label="Username" aria-describedby="addon-wrapping" />
                                <a role="button" class="e-icon">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M7.39457 8.3137C7.5745 8.50605 7.67329 8.75731 7.67329 9.01724V16.6765C7.67329 17.1375 8.23956 17.3714 8.57474 17.0474L10.7499 14.5988C11.0409 14.2557 11.2015 14.0859 11.2015 13.7463V9.01898C11.2015 8.75904 11.302 8.50778 11.4802 8.31541L17.7215 1.66293C18.189 1.16387 17.8291 0.354614 17.1376 0.354614H1.73712C1.0456 0.354614 0.683961 1.16213 1.15321 1.66293L7.39457 8.3137Z"
                                            fill="#7F7F7F" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Chats -->
                        <div  class="d-flex flex-column">
                          
                          <div id="chat_items_skeletons" class="d-none">
                            <x-chat_preview_skeleton />
                            <x-chat_preview_skeleton />
                            <x-chat_preview_skeleton />
                            <x-chat_preview_skeleton />
                            <x-chat_preview_skeleton />
                          </div>

                          <div id="chat_items" class="d-none">

                          </div>
                        </div>
                    </div>
                    <!-- Chat Window -->
                    <div  class="col-md-8  position-relative">
                      
                      <div id="chat_window" class="d-none">
          
                      </div>

                      <div id="chat_window_skeleton" class="d-none">

                      </div>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>