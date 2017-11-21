<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<h1>Not&iacute;cias sobre Tecnologia em geral</h1>
<hr>
<?php
$RSS_Content = array();

	function RSS_Tags($item, $type)
	{
		$y = array();
		$tnl = $item->getElementsByTagName("title");
		$tnl = $tnl->item(0);
		$title = $tnl->firstChild->textContent;

		$tnl = $item->getElementsByTagName("link");
		$tnl = $tnl->item(0);
		$link = $tnl->firstChild->textContent;

		$tnl = $item->getElementsByTagName("pubDate");
		$tnl = $tnl->item(0);
		$date = $tnl->firstChild->textContent;

		$tnl = $item->getElementsByTagName("description");
		$tnl = $tnl->item(0);
		$description = $tnl->firstChild->textContent;

		$y["title"] = $title;
		$y["link"] = $link;
		$y["date"] = $date;
		$y["description"] = $description;
		$y["type"] = $type;

		return $y;
	}

	function RSS_Channel($channel)
	{
		global $RSS_Content;
		$items = $channel->getElementsByTagName("item");
		
		$y = RSS_Tags($channel, 0);
		array_push($RSS_Content, $y);

		foreach($items as $item)
		{
			$y = RSS_Tags($item, 1);
			array_push($RSS_Content, $y);
		}
	}

	function RSS_Retrieve($url)
	{
		global $RSS_Content;

		$doc  = new DOMDocument();
		$doc->load($url);

		$channels = $doc->getElementsByTagName("channel");

		$RSS_Content = array();

		foreach($channels as $channel)
		{
			RSS_Channel($channel);
		}

	}
				
	function RSS_RetrieveLinks($url)
	{
		global $RSS_Content;

		$doc  = new DOMDocument();
		$doc->load($url);

		$channels = $doc->getElementsByTagName("channel");

		$RSS_Content = array();

		foreach($channels as $channel)
		{
			$items = $channel->getElementsByTagName("item");
			foreach($items as $item)
			{
				$y = RSS_Tags($item, 1);
				array_push($RSS_Content, $y);
			}

		}

	}
				
	function RSS_Links($url, $size = 15)
	{
		global $RSS_Content;

		RSS_RetrieveLinks($url);
		if($size > 0)
			$recents = array_slice($RSS_Content, 0, $size + 1);

			foreach($recents as $article)
			{
				$type = $article["type"];
				if($type == 0) continue;
					$title = $article["title"];
					$link = $article["link"];
					$page .= " <a href=\"$link\">$title</a>\n";		
			}

			$page .="<br>\n";
				
			return $page;

	}
				
	function RSS_Display($url, $size = 15, $site = 0, $withdate = 1)
	{
		global $RSS_Content;

		$opened = false;
		$page = "";
		$site = (intval($site) == 0) ? 1 : 0;

		RSS_Retrieve($url);
		if($size > 0)
			$recents = array_slice($RSS_Content, $site, $size + 1 - $site);

			foreach($recents as $article)
			{
				$type = $article["type"];
				if($type == 0)
				{
					if($opened == true)
					{
						$page .="<br>\n";
						$opened = false;
					}
				}
				else
				{
					if($opened == false) 
					{
						$opened = true;
					}
				}
				$title = $article["title"];
				$link = $article["link"];
				$page .= "<a href=\"$link\">$title</a>";
						
						
				if($withdate)
				{
				    $date = $article["date"];
					$timestamp = strtotime($date);
					$data_brasil = date('d/m/Y', $timestamp);
				    $partes = explode(' ',$date);
					$date = $data_brasil." ".$partes[4];
				    $page .=' :: '.$date.'<br>';
				}

				$description = $article["description"];

				if($description != false)
				{
					$page .= $description."<br><br>";
				}		

			}

			$page = str_replace("<a","<a target=".Chr(34)."_blank".Chr(34),$page);

			return $page."\n";
	}
echo RSS_Display("http://g1.globo.com/dynamo/tecnologia/rss2.xml", 10);
?>
<hr>
<strong>Mais not&iacute;cias em: <a href="http://g1.globo.com" target="_blank">G1</a></strong>