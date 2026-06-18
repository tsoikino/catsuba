<?php

$config = [
    "name" => "catsuba.is",
    "description" => "Catsuba imageboard.",
    "customDevName" => "Catsuba 1.0.0", #custom footer text
    "driver" => "sqlite",
    "media_approval" => false, # If true, all media defaults to res/content_pending.png instead of it's proper image until approved
    "sqlite" => [
        "ib" => "imageboard.db",
        "bans" => "bans.db"
    ],
    "mysql" => [
        "host" => "localhost",
        "user" => "",
        "pass" => "",
        "db" => "" 
    ],
    "favicon" => "res/favicon.png",
    "uploadFiles" => ["png","jpg","mov","mp3"], #upload files
    "uploadDir" => "upl",
    "css" => "res/stylesheet.css", #default, maybe themes in the future
    "announcement" => null,
    #use urls
    "banners" => [
        ""
    ],

    #credentials
    "admin" => "securekey123", #change ASAP


    #capcodes 
    "cap_admin" => "securecap123", #change ASAP
];  
#
$boards = [
    "b" => [
        "title" => "Random",
        "id" => 1
    ]
];
#index.php (body)
$index = [
    /*
        Links should be formatted using {href -- name}.

        OLs, ULs, and LI elements are rendered with:
        {@ul - UL
        {@ol - OL 
        {@li - LI
        
        HR and BR tags are rendered with:
        {@hr - HR
        {@br - BR

        Close all of these with their respective names. (e.g. "{/@li}")
    */
    "boxes" => [
        "1" => [
            "title" => "What is " . $config["name"] . "?",
            "content" => $config["name"] . " is an imageboard dedicated to cats."
        ],
        "2" => [
            "title" => "Rules",
            "content" => "Rules can be read {rules.php here}."
        ]
    ],
    "topbar" =>
    [
        "links" => [
            #name -- link
            "home" => "/",
            "boards" => 
            [ 
                "b" => "board.php?i=1"
            ],
            "rules" => "rules.php"
        ]
    ],
    "footer" => "2026, " . $config["name"] . " Community. Running " . $config["customDevName"],
];
#rules
$rules = [
    "boxes" => [
        "1" => [
            "title" => "About " . $config["name"],
            "content" => $config["name"] . " enforces it's rules strictly in order to ensure community quality."
        ],
        "2" => [
            "title" => "Sitewide Rules",
            "content" => 
            "
                The sitewide rules are as follow:
                {@ol}    
                {@li} Do not spam or render this service unusable for others, or otherwise damage this service. {@/li}
                {@li} Do not post illegal content or encourage illegal activity, within the jurisdiction of the United States, or your home country. {@/li} 
                {@li} Do not disrespect cats in any capacity. {@/li}
                {@li} Do not post NSFW content, which includes, but is not limited to: Gore, Porn, Smut, or any other erotic, obscene or graphic material. {@/li}
                {@/ol}
            "
        ]   

    ]
];

