<?php

class SiteDispatcher
{
	// сохраняем найденный конфиг в сессию
	public static function setCurrentSiteConfig( $configName )
	{
		@session_start();
		$_SESSION['CURRENT_SITE_CONFIG'] = array(
			'host' => $_SERVER['HTTP_HOST'],
			'configName' => $configName
		);
		@session_write_close();
		@session_destroy();
	}

	// выбираем ранее заданный конфиг из сессии
	public static function getCurrentSiteConfig()
	{
		@session_start();
		$res = isset( $_SESSION['CURRENT_SITE_CONFIG'] )
			? $_SESSION['CURRENT_SITE_CONFIG']
			: false;
		@session_write_close();
		@session_destroy();
		return $res;
	}

	public static function getConfigPath()
	{
		$arSites = self::getAvailableConfigs();

		/*
		если в сессии есть выбранный сайт, то смотрим на совпадение хостов, если они совпали,
		то проверяем значение-имякконфига на валидность и возращем его или идём по правилам
		*/
		if ( ($arCurrent = self::getCurrentSiteConfig())
			&& $arCurrent['host'] == $_SERVER['HTTP_HOST']
			&& isset($arSites[$arCurrent['configName']]) )
		{
			return 'protected/config/' . $arCurrent['configName'] . '.php';
		}

		foreach ( $arSites as $configName => $arSiteConfig )
		{
			$res = true;
			$res &= in_array( $_SERVER['HTTP_HOST'], $arSiteConfig['host'] );
			if ( $res )
			{
				return 'protected/config/' . $configName . '.php';
			}
		}

		error_log('Can\'t determine config to site: ' . var_export( array(
			'host' => $_SERVER['HTTP_HOST'],
		), 1));
		throw new Exception('Can\'t determine config to site');
	}


	/**
	 *
	 * @static
	 * @return mixed
	 */
	protected static function getAvailableConfigs()
	{
		return require( dirname(dirname(__FILE__)) . '/config/sites.php' );
	}

}