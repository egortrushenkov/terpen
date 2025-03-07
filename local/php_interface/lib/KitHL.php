<?php

	namespace lib;

	use \Bitrix\Main\Loader,
		\Bitrix\Highloadblock\HighloadBlockTable as HLBT;
	Loader::includeModule('highloadblock');

	class KitHL
	{
		/**
		 * @param $HlBlockId
		 * @return false
		 * Подключение к таблице HL
		 */
		public static function GetEntityDataClass($HlBlockId) {
			if( empty( $HlBlockId ) || $HlBlockId < 1 ) {
				return false;
			}
			$hlblock = HLBT::getById( $HlBlockId )->fetch();
			$entity = HLBT::compileEntity( $hlblock );
			$entity_data_class = $entity->getDataClass();
			return $entity_data_class;
		}



		/**
		 * Retrieves a list of elements from a Highload Block (HL) table.
		 *
		 * @param int $HlBlockId The ID of the Highload Block.
		 * @param array $filter An array of filter conditions. Default is an empty array.
		 * @param array $select An array of fields to select. Default is an array containing '*'.
		 * @param array $order An array of sorting conditions. Default is an array with 'ID' => 'ASC'.
		 *
		 * @return array|bool An array of elements or false if the Highload Block ID is invalid.
		 *
		 * @throws \Bitrix\Main\LoaderException If the 'highloadblock' module is not loaded.
		 * @throws \Bitrix\Main\ArgumentException If the Highload Block ID is invalid.
		 * @throws \Bitrix\Main\SystemException If the Highload Block table cannot be found.
		 */
		public static function getList($HlBlockId, $filter = array(), $select = array('*'), $order = array("ID" => "ASC"), $limit = false){
			$return = false;
			$entity_data_class = self::GetEntityDataClass($HlBlockId);
			$params = array(
				'order' => $order,
				'select' => $select,
				'filter' => $filter,
				'limit' => $limit
			);
			$rsData = $entity_data_class::getList($params);
			while($el = $rsData->fetch()){
				$return[] = $el;
			}
			return $return;
		}



		/**
		 * @param $HlBlockId
		 * @param $inp_data
		 * @return mixed
		 * Добавление элемента в HL
		 */
		public static function addEl($HlBlockId, $inp_data)
		{
			$entity_data_class = self::GetEntityDataClass($HlBlockId);
			return $entity_data_class::add($inp_data);

		}



		/**
		 * @param $HlBlockId
		 * @param $elID
		 * @param $inp_data
		 * @return mixed
		 * Обновление элемента в HL
		 */
		public static function updateEl($HlBlockId, $elID, $inp_data){
			$entity_data_class = self::GetEntityDataClass($HlBlockId);
			return $entity_data_class::update($elID, $inp_data);
		}



		/**
         * @param $HlBlockId
         * @param $elID
         * @return mixed
         * Удаление элемента в HL
		 */
		public static function deleteEl($HlBlockId, $elID){
			$entity_data_class = self::GetEntityDataClass($HlBlockId);
			return $entity_data_class::delete($elID);
		}


		public static function GetFields($HlBlockId){
			if( empty( $HlBlockId ) || $HlBlockId < 1 ) {
				return false;
			}
			$hlblock = HLBT::getById( $HlBlockId )->fetch();
			$entity = HLBT::compileEntity($hlblock);

			return $entity->getFields();
		}
	}



