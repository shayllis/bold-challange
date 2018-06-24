<?php
	namespace App\View\Helper;

	use Cake\View\Helper;

	class StarsHelper extends Helper
	{
		public function prettyCount(int $rating)
		{
			$total = 5;
			$greyStars = join(' ', array_fill(0, $total - $rating, '<span class="fa fa-star text-default"></span>'));
			$yellow =  join(' ', array_fill(0, $rating, '<span class="fa fa-star text-yellow"></span>'));

			return "{$yellow} {$greyStars}";
		}
	}
