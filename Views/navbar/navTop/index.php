<div class="navTop">
    <div class="navTop-logo">
        <a href="/">Projet BdD</a>
    </div>
    <div class="navTop-searchBar">
        <div>
            <label for="search">
                <div>
                    <svg fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em">
                        <g fill-rule="evenodd" transform="translate(-448 -544)">
                            <g fill-rule="nonzero">
                                <path d="M10.743 2.257a6 6 0 1 1-8.485 8.486 6 6 0 0 1 8.485-8.486zm-1.06 1.06a4.5 4.5 0 1 0-6.365 6.364 4.5 4.5 0 0 0 6.364-6.363z" transform="translate(448 544)"></path>
                                <path d="M10.39 8.75a2.94 2.94 0 0 0-.199.432c-.155.417-.23.849-.172 1.284.055.415.232.794.54 1.103a.75.75 0 0 0 1.112-1.004l-.051-.057a.39.39 0 0 1-.114-.24c-.021-.155.014-.356.09-.563.031-.081.06-.145.08-.182l.012-.022a.75.75 0 1 0-1.299-.752z" transform="translate(448 544)"></path>
                                <path d="M9.557 11.659c.038-.018.09-.04.15-.064.207-.077.408-.112.562-.092.08.01.143.034.198.077l.041.036a.75.75 0 0 0 1.06-1.06 1.881 1.881 0 0 0-1.103-.54c-.435-.058-.867.018-1.284.175-.189.07-.336.143-.433.2a.75.75 0 0 0 .624 1.356l.066-.027.12-.061z" transform="translate(448 544)"></path>
                                <path d="m13.463 15.142-.04-.044-3.574-4.192c-.599-.703.355-1.656 1.058-1.057l4.191 3.574.044.04c.058.059.122.137.182.24.249.425.249.96-.154 1.41l-.057.057c-.45.403-.986.403-1.411.154a1.182 1.182 0 0 1-.24-.182zm.617-.616.444-.444a.31.31 0 0 0-.063-.052c-.093-.055-.263-.055-.35.024l.208.232.207-.206.006.007-.22.257-.026-.024.033-.034.025.027-.257.22-.007-.007zm-.027-.415c-.078.088-.078.257-.023.35a.31.31 0 0 0 .051.063l.205-.204-.233-.209z" transform="translate(448 544)"></path>
                            </g>
                        </g>
                    </svg>
                </div>
                <input type="text" id="search" placeholder="Rechercher sur Projet BdD">
            </label>
        </div>
    </div>
    <div class="navTop-social">
        <div>
            <div role="button" id="profil">
                <svg style="width: 40px;height: 40px;">
                    <mask id="jsc_c_f">
                        <circle cx="20" cy="20" fill="white" r="20"></circle>
                        <circle cx="34" cy="34" data-visualcompletion="ignore" fill="black" r="8"></circle>
                        <path fill-rule="nonzero" d="M452.707 549.293a1 1 0 0 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L456 552.586l-3.293-3.293z"></path>
                    </mask>
                    <g mask="url(#jsc_c_f)">
                        <image style="width: 40px;height: 40px;" xlink:href="assets/image/user.png" alt=""></image>
                        <circle class="fill-none" id="circle" cx="20" cy="20" r="20"></circle>
                    </g>
                </svg>
                <div id="down" class="background-secondary">
                    <svg fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em" style="width: 12px;height: 12px;display: block;">
                        <g fill-rule="evenodd" transform="translate(-448 -544)">
                            <path fill-rule="nonzero" d="M452.707 549.293a1 1 0 0 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L456 552.586l-3.293-3.293z"></path>
                        </g>
                    </svg>
                    <div id="downHover" class="opacity-0"></div>
                </div>
                <div id="profilHover" class="opacity-0 background-hover"></div>
            </div>
        </div>
        <div>
            <?php include ROOT."/Views/navbar/navTop/card-profil.php"; ?>
        </div>
    </div>
</div>