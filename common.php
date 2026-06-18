
<?php


#utils
#primarily rendering functions
function renderBoxes($data) {
    $html = "";

    $formattingTags = [
        "{@ul}" => "<ul>",  "{@/ul}" => "</ul>",
        "{@ol}" => "<ol>",  "{@/ol}" => "</ol>",
        "{@li}" => "<li>",  "{@/li}" => "</li>",
        "{@hr}" => "<hr/>",
        "{@br}" => "<br/>",
        
        "{@ul" => "<ul>", "{@ol" => "<ol>", "{@li" => "<li>",
        "{@hr" => "<hr/>", "{@br" => "<br/>"
    ];

    foreach ($data as $box) {
        $title = e($box["title"] ?? "");

        $content = parseLinks(e($box["content"] ?? ""));
        
        $content = strtr($content, $formattingTags);

        $html .= "
            <div class='box'>
                <h3>{$title}</h3>
                <p>{$content}</p>
            </div>
        ";
    }

    return $html;
}
function e($str) {
    return htmlspecialchars($str ?? "", ENT_QUOTES, "UTF-8");
}
function parseLinks($text) {
    return preg_replace_callback(
        '/\{([^}\s]+)\s+([^}]+)\}/', 
        function ($m) {

            $url = filter_var($m[1], FILTER_SANITIZE_URL);

            // whitelist protection
            if (!preg_match('#^(https?://|/|rules\.php)#', $url)) {
                return htmlspecialchars($m[2], ENT_QUOTES, "UTF-8");
            }

            $text = htmlspecialchars($m[2], ENT_QUOTES, "UTF-8");

            return "<a href='{$url}'>{$text}</a>";
        },
        $text
    );
}

function renderTopbar($topbar) {
    $html = "<div class='top'>";

    foreach ($topbar["links"] ?? [] as $key => $value) {
        
        if (is_array($value)) {
            $html .= "[ ";
            $subLinks = [];
            
            foreach ($value as $subName => $subLink) {
                $safeName = htmlspecialchars($subName, ENT_QUOTES, "UTF-8");
                $safeLink = htmlspecialchars($subLink, ENT_QUOTES, "UTF-8");
                $subLinks[] = "<a href='{$safeLink}'>{$safeName}</a>";
            }
            
            $html .= implode(" / ", $subLinks);
            $html .= " ] ";
            
        } else {
            $safeName = htmlspecialchars($key, ENT_QUOTES, "UTF-8");
            $safeLink = htmlspecialchars($value, ENT_QUOTES, "UTF-8");
            
            $html .= "[ <a href='{$safeLink}'>{$safeName}</a> ] ";
        }
    }

    $html .= "</div>";

    return $html;
}

#post utils

function boardinfo($searchId, $boards) {
    $searchId = (int)$searchId;

    foreach ($boards as $code => $board) {
        if ((int)($board['id'] ?? 0) === $searchId) {
            
            $board['code'] = $code; 
            
            return $board;
        }
    }

    return null; 
}