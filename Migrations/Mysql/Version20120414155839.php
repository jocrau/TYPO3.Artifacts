<?php
namespace TYPO3\FLOW3\Persistence\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration,
Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your need!
 */
class Version20120414155839 extends AbstractMigration {

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function up(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");

		$this->addSql("
				INSERT INTO `typo3_semantic_domain_model_sparql_query` (`flow3_persistence_identifier`, `endpoint`, `name`, `body`, `quoted_limit`, `quoted_offset`)
				VALUES
					('8773c1a3-d201-414e-b20d-20b55aae9816','6eb825e0-859c-11e1-b0c4-0800200c9a66','All Artifacts','SELECT DISTINCT ?artifact ?title ?description ?key ?version ?downloads ?status ?firstName ?lastName\r\nWHERE {\r\n  { ?artifact rdf:type t3o:Extension }\r\n  UNION\r\n  { ?artifact rdf:type t3o:Package }\r\n  ?artifact dc:title ?title ;\r\n     dc:creator ?creator_resource ;\r\n     t3o:key ?key ;\r\n     t3o:status ?status ;\r\n     dcterms:hasVersion ?version .\r\n  OPTIONAL {\r\n    ?artifact dc:description ?description .\r\n    FILTER (LANG(?description) = \'en\')\r\n  }\r\n  ?creator_resource foaf:firstName ?firstName ;\r\n                    foaf:lastName ?lastName .\r\n  OPTIONAL {\r\n    ?creator_resource foaf:workInfoHomepage ?homepage .\r\n  }\r\n  FILTER (LANG(?title) = \'en\')\r\n}','0','0');
			");
		$this->addSql("
				INSERT INTO `typo3_semantic_domain_model_sparql_query_namespaces_join` (`semantic_sparql_query`, `semantic_rdf_rdfnamespace`)
				VALUES
					('8773c1a3-d201-414e-b20d-20b55aae9816','81c75192-858a-11e1-b0c4-0800200c9a66'),
					('8773c1a3-d201-414e-b20d-20b55aae9816','81c778a2-858a-11e1-b0c4-0800200c9a66'),
					('8773c1a3-d201-414e-b20d-20b55aae9816','81c778a3-858a-11e1-b0c4-0800200c9a66'),
					('8773c1a3-d201-414e-b20d-20b55aae9816','81c778b0-858a-11e1-b0c4-0800200c9a66'),
					('8773c1a3-d201-414e-b20d-20b55aae9816','81c778b1-858a-11e1-b0c4-0800200c9a66'),
					('8773c1a3-d201-414e-b20d-20b55aae9816','81c778b5-858a-11e1-b0c4-0800200c9a66'),
					('8773c1a3-d201-414e-b20d-20b55aae9816','81c778bc-858a-11e1-b0c4-0800200c9a66');
			");
	}

	/**
	 * @param Schema $schema
	 * @return void
	 */
	public function down(Schema $schema) {
		$this->abortIf($this->connection->getDatabasePlatform()->getName() != "mysql");
	}
}

?>