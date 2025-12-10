<?php

class paginate
{
	private $db;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection("", "", "", "", "yes");
		$this->db = $db;
    }
	
	public function add($title,$content)
	{
		try
		{		
			$time = date("Y-m-d H:i:s", time());
			
			$stmt = $this->db->prepare("INSERT INTO news(title, content, time) VALUES(:title, :content, :time)");
			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":content", $content);
			$stmt->bindparam(":time", $time);
				
			$stmt->execute();
			
			return $stmt;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
			print 'ERROR';
		}
	}
	
	public function edit($id, $title, $content)
	{
		try
		{		
			$time = date("Y-m-d H:i:s", time());
			
			$stmt = $this->db->prepare("UPDATE news SET title=:title, content=:content, time=:time WHERE id=:id");
			$stmt->bindparam(":title", $title);
			$stmt->bindparam(":content", $content);
			$stmt->bindparam(":time", $time);
			$stmt->bindparam(":id", $id);
				
			$stmt->execute();
			
			return $stmt;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
			print 'ERROR';
		}
	}
	
	public function delete_article($id)
	{
		try
		{		
			$stmt = $this->db->prepare("DELETE FROM news WHERE id = :id");
			$stmt->bindparam(":id", $id);
				
			$stmt->execute();
			
			return $stmt;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
			print 'ERROR';
		}
	}
	
	public function check_id($id)
	{
		try
		{		
			$stmt = $this->db->prepare("SELECT id FROM news WHERE id = :id LIMIT 1");
			$stmt->bindparam(":id", $id);
				
			$stmt->execute();
			$result = $stmt->fetchAll();
			
			if(count($result))
				return 1;
			else return 0;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
			print 'ERROR';
		}
	}
	
	public function read($id)
	{
		try
		{		
			$stmt = $this->db->prepare("SELECT * FROM news WHERE id = :id LIMIT 1");
			$stmt->bindparam(":id", $id);
				
			$stmt->execute();
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			return $result;
		}
		catch(PDOException $e)
		{
			//echo $e->getMessage();
			print 'ERROR';
		}
	}
	
	public function dataview($query, $sure, $web_admin, $news_lvl, $site_url, $read_more)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		$rowCount = count($stmt->fetchAll());
		
		$stmt = $this->db->prepare($query);
		$stmt->execute();
		
		if($rowCount>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
				$big = false;
				$string = strip_tags($row['content']);
				
				$image = array();
				preg_match('/<img.+src=[\'"](?P<src>.+?)[\'"].*>/i', $row['content'], $image);
								
				if (strlen($string) > 500) {
					$big = true;
					$stringCut = substr($string, 0, 500);
					$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
				}
				if(!$big)
					$string = $row['content'];
				?>
				
				
				<div class="news-slider-panel news-slider-panel-update">
					<h4 class="news-title"><?php print $row['title']; ?></h4>
					<h6 class="news-author"><?php print $row['time']; ?> <?php if($web_admin>=$news_lvl) { ?><a href="<?php print $site_url; ?>read/<?php print $row['id']; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="<?php print $site_url; ?>?delete=<?php print $row['id']; ?>" onclick="return confirm('<?php print $sure; ?>');"><i style="color:red;" class="fa fa-trash" aria-hidden="true"></i></a><?php } ?></h6>
					<div style="text-align: left;">
						<?php print $string; ?>
					</div>
					<a href="<?php print $site_url; ?>read/<?php print $row['id']; ?>" class="news-button"><?= $read_more;?></a>
				</div>
                <?php
			}
		}
	}
	
	public function paging($query,$records_per_page)
	{
		$starting_position=0;
		if(isset($_GET["page_no"]))
		{
			if(is_numeric($_GET["page_no"]))
				$starting_position=($_GET["page_no"]-1)*$records_per_page;
		}
		$query2=$query." limit $starting_position,$records_per_page";
		return $query2;
	}
	
	public function paginglink($query,$records_per_page,$first,$last,$self)
	{		
		$self = $self.'news/';
		
		$sql = "SELECT count(*) ".strstr($query, 'FROM');
		
		$stmt = $this->db->prepare($sql);
		$stmt->execute(); 
		
		$total_no_of_records = $stmt->fetchColumn();
	}
}
?>