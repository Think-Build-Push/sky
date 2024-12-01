<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;
use Ulid\Ulid;

class LocaleSeeder extends AbstractSeed
{
	private string $table_name = '_locale';

	private array $langs = [ 1 => 'en', 2 => 'es', 3 => 'fr', 4 => 'de' ];

	public function run(): void
	{
		$locales = IntlCalendar::getAvailableLocales();
		foreach($locales as $locale)
		{
			foreach( $this->langs as $lang_id => $lang )
			{
				$name = Locale::getDisplayName($locale, $lang);
				$row = [
					"fk__lang_id" => $lang_id,
					"{$this->table_name}_name" => $name,
					"{$this->table_name}_code" => $locale,
					"{$this->table_name}_ulid" => Ulid::generate(true)
				];

				$rows[] = $row;
			}
		}

		$this->table($this->table_name)->insert($rows)->saveData();
	}
}