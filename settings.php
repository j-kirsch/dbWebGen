<?php
$APP = [
  'title' => 'datapest',
  'view_display_null_fields' => false,
  'page_size' => 10,
  'max_text_len' => 250,
  'pages_prevnext' => 2,
  'mainmenu_tables_autosort' => true,
  'search_lookup_resolve' => true,
  'search_string_transformation' => 'lower((%s)::text)',
  'popup_hide_reverse_linkage' => true,
];

$DB = [
  'type' => DB_POSTGRESQL,
  'host' => 'db',
  'port' => 5432,
  'user' => 'postgres',
  'pass' => 'docker',
  'db' => 'datapest',
];

$LOGIN = [
];

$TABLES = [
  'beziehung' => [
    'display_name' => 'Beziehung',
    'description' => '',
    'item_name' => 'Beziehung',
    'actions' => [
      0 => MODE_EDIT,
      1 => MODE_NEW,
      2 => MODE_VIEW,
      3 => MODE_LIST,
      4 => MODE_DELETE,
      5 => MODE_LINK,
    ],
    'fields' => [
      'beziehungvon' => [
        'label' => 'Beziehungvon',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'person',
          'field' => 'personid',
          'display' => 'name',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Person',
      ],
      'artderbeziehung' => [
        'label' => 'Artderbeziehung',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'beziehungart',
          'field' => 'beziehungartid',
          'display' => 'beziehungart',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Beziehungart',
      ],
      'beziehungmit' => [
        'label' => 'Beziehungmit',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'person',
          'field' => 'personid',
          'display' => 'name',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Person',
      ],
      'id' => [
        'label' => 'ID',
        'required' => true,
        'editable' => false,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
          'sequence' => 'beziehung_id_seq',
        ],
      ],
    ],
    'primary_key' => [
      'columns' => [
        0 => 'id',
      ],
      'auto' => true,
      'sequence_name' => 'beziehung_id_seq',
    ],
  ],
  'beziehungart' => [
    'display_name' => 'Beziehungart',
    'description' => '',
    'item_name' => 'Beziehungart',
    'actions' => [
      0 => MODE_EDIT,
      1 => MODE_NEW,
      2 => MODE_VIEW,
      3 => MODE_LIST,
      4 => MODE_DELETE,
      5 => MODE_LINK,
    ],
    'fields' => [
      'beziehungartid' => [
        'label' => 'Beziehungartid',
        'required' => true,
        'editable' => false,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
          'sequence' => 'beziehungart_beziehungartid_seq',
        ],
      ],
      'beziehungart' => [
        'label' => 'Beziehungart',
        'required' => true,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'character varying',
        ],
        'len' => 100,
        'resizeable' => true,
      ],
      'beziehung_artderbeziehung_rev_fk' => [
        'label' => 'Beziehung (Artderbeziehung)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'beziehung',
          'field' => 'id',
          'display' => 'id',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'beziehung',
          'fk_self' => 'artderbeziehung',
          'fk_other' => 'id',
        ],
      ],
    ],
    'primary_key' => [
      'columns' => [
        0 => 'beziehungartid',
      ],
      'auto' => true,
      'sequence_name' => 'beziehungart_beziehungartid_seq',
    ],
  ],
  'marker' => [
    'display_name' => 'Marker',
    'description' => '',
    'item_name' => 'Marker',
    'actions' => [
      0 => MODE_EDIT,
      1 => MODE_NEW,
      2 => MODE_VIEW,
      3 => MODE_LIST,
      4 => MODE_DELETE,
      5 => MODE_LINK,
    ],
    'fields' => [
      'markerid' => [
        'label' => 'Markerid',
        'required' => true,
        'editable' => false,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
          'sequence' => 'marker_markerid_seq',
        ],
      ],
      'marker' => [
        'label' => 'Marker',
        'required' => false,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'character varying',
        ],
        'len' => 100,
        'resizeable' => true,
      ],
      'person_personenmarker_rev_fk' => [
        'label' => 'Person (Personenmarker)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'person',
          'field' => 'personid',
          'display' => 'name',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'person',
          'fk_self' => 'personenmarker',
          'fk_other' => 'personid',
        ],
      ],
      'person_weiterermarker_rev_fk' => [
        'label' => 'Person (Weiterermarker)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'person',
          'field' => 'personid',
          'display' => 'name',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'person',
          'fk_self' => 'weiterermarker',
          'fk_other' => 'personid',
        ],
      ],
    ],
    'primary_key' => [
      'columns' => [
        0 => 'markerid',
      ],
      'auto' => true,
      'sequence_name' => 'marker_markerid_seq',
    ],
  ],
  'person' => [
    'display_name' => 'Person',
    'description' => '',
    'item_name' => 'Person',
    'actions' => [
      0 => MODE_EDIT,
      1 => MODE_NEW,
      2 => MODE_VIEW,
      3 => MODE_LIST,
      4 => MODE_DELETE,
      5 => MODE_LINK,
    ],
    'fields' => [
      'personid' => [
        'label' => 'Personid',
        'required' => true,
        'editable' => false,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
          'sequence' => 'person_personid_seq',
        ],
      ],
      'name' => [
        'label' => 'Name',
        'required' => true,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'character varying',
        ],
        'len' => 100,
        'resizeable' => true,
      ],
      'geschlecht' => [
        'label' => 'Geschlecht',
        'required' => true,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'character',
        ],
        'len' => 1,
      ],
      'personenmarker' => [
        'label' => 'Personenmarker',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'marker',
          'field' => 'markerid',
          'display' => 'marker',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Marker',
      ],
      'alternativenamen' => [
        'label' => 'Alternativenamen',
        'required' => false,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'text',
        ],
      ],
      'weiterermarker' => [
        'label' => 'Weiterermarker',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'marker',
          'field' => 'markerid',
          'display' => 'marker',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Marker',
      ],
      'beziehung_beziehungvon_rev_fk' => [
        'label' => 'Beziehung (Beziehungvon)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'beziehung',
          'field' => 'id',
          'display' => 'id',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'beziehung',
          'fk_self' => 'beziehungvon',
          'fk_other' => 'id',
        ],
      ],
      'beziehung_beziehungmit_rev_fk' => [
        'label' => 'Beziehung (Beziehungmit)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'beziehung',
          'field' => 'id',
          'display' => 'id',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'beziehung',
          'fk_self' => 'beziehungmit',
          'fk_other' => 'id',
        ],
      ],
      'urkunde_person_person_id_rev_fk' => [
        'label' => 'Urkunde Person (Person Id)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'urkunde_person',
          'field' => 'id',
          'display' => 'id',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'urkunde_person',
          'fk_self' => 'person_id',
          'fk_other' => 'id',
        ],
      ],
    ],
    'primary_key' => [
      'columns' => [
        0 => 'personid',
      ],
      'auto' => true,
      'sequence_name' => 'person_personid_seq',
    ],
  ],
  'rollen' => [
    'display_name' => 'Rollen',
    'description' => '',
    'item_name' => 'Rollen',
    'actions' => [
      0 => MODE_EDIT,
      1 => MODE_NEW,
      2 => MODE_VIEW,
      3 => MODE_LIST,
      4 => MODE_DELETE,
      5 => MODE_LINK,
    ],
    'fields' => [
      'rollenid' => [
        'label' => 'Rollenid',
        'required' => true,
        'editable' => false,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
          'sequence' => 'rollen_rollenid_seq',
        ],
      ],
      'rolle' => [
        'label' => 'Rolle',
        'required' => true,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'character varying',
        ],
        'len' => 100,
        'resizeable' => true,
      ],
      'urkunde_person_rolle_id_rev_fk' => [
        'label' => 'Urkunde Person (Rolle Id)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'urkunde_person',
          'field' => 'id',
          'display' => 'id',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'urkunde_person',
          'fk_self' => 'rolle_id',
          'fk_other' => 'id',
        ],
      ],
    ],
    'primary_key' => [
      'columns' => [
        0 => 'rollenid',
      ],
      'auto' => true,
      'sequence_name' => 'rollen_rollenid_seq',
    ],
  ],
  'sachen' => [
    'display_name' => 'Sachen',
    'description' => '',
    'item_name' => 'Sachen',
    'actions' => [
      0 => MODE_EDIT,
      1 => MODE_NEW,
      2 => MODE_VIEW,
      3 => MODE_LIST,
      4 => MODE_DELETE,
      5 => MODE_LINK,
    ],
    'fields' => [
      'sachenid' => [
        'label' => 'Sachenid',
        'required' => true,
        'editable' => false,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
          'sequence' => 'sachen_sachenid_seq',
        ],
      ],
      'sache' => [
        'label' => 'Sache',
        'required' => true,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'character varying',
        ],
        'len' => 100,
        'resizeable' => true,
      ],
      'urkunde_sachederurkunde_rev_fk' => [
        'label' => 'Urkunde (Sachederurkunde)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'urkunde',
          'field' => 'urkundeid',
          'display' => 'signatur',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'urkunde',
          'fk_self' => 'sachederurkunde',
          'fk_other' => 'urkundeid',
        ],
      ],
    ],
    'primary_key' => [
      'columns' => [
        0 => 'sachenid',
      ],
      'auto' => true,
      'sequence_name' => 'sachen_sachenid_seq',
    ],
  ],
  'urkunde' => [
    'display_name' => 'Urkunde',
    'description' => '',
    'item_name' => 'Urkunde',
    'actions' => [
      0 => MODE_EDIT,
      1 => MODE_NEW,
      2 => MODE_VIEW,
      3 => MODE_LIST,
      4 => MODE_DELETE,
      5 => MODE_LINK,
    ],
    'fields' => [
      'urkundeid' => [
        'label' => 'Urkundeid',
        'required' => true,
        'editable' => false,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
          'sequence' => 'urkunde_urkundeid_seq',
        ],
      ],
      'nrregest' => [
        'label' => 'Nrregest',
        'required' => true,
        'editable' => true,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'smallint',
        ],
        'step' => 1,
        'max' => 32768,
        'min' => -32768,
      ],
      'signatur' => [
        'label' => 'Signatur',
        'required' => true,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'character varying',
        ],
        'len' => 40,
      ],
      'tag' => [
        'label' => 'Tag',
        'required' => false,
        'editable' => true,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
        ],
        'step' => 1,
        'max' => 2147483648,
        'min' => -2147483648,
      ],
      'monat' => [
        'label' => 'Monat',
        'required' => false,
        'editable' => true,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
        ],
        'step' => 1,
        'max' => 2147483648,
        'min' => -2147483648,
      ],
      'jahr' => [
        'label' => 'Jahr',
        'required' => false,
        'editable' => true,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
        ],
        'step' => 1,
        'max' => 2147483648,
        'min' => -2147483648,
      ],
      'ort' => [
        'label' => 'Ort',
        'required' => false,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'character varying',
        ],
        'len' => 100,
        'resizeable' => true,
      ],
      'anmerkung' => [
        'label' => 'Anmerkung',
        'required' => false,
        'editable' => true,
        'type' => T_TEXT_LINE,
        'pg_info' => [
          'type' => 'text',
        ],
      ],
      'sachederurkunde' => [
        'label' => 'Sachederurkunde',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'sachen',
          'field' => 'sachenid',
          'display' => 'sache',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Sachen',
      ],
      'urkunde_person_urkunde_id_rev_fk' => [
        'label' => 'Urkunde Person (Urkunde Id)',
        'required' => false,
        'editable' => false,
        'type' => T_LOOKUP,
        'lookup' => [
          'cardinality' => CARDINALITY_MULTIPLE,
          'table' => 'urkunde_person',
          'field' => 'id',
          'display' => 'id',
          'label_display_expr_only' => true,
        ],
        'linkage' => [
          'table' => 'urkunde_person',
          'fk_self' => 'urkunde_id',
          'fk_other' => 'id',
        ],
      ],
    ],
    'primary_key' => [
      'columns' => [
        0 => 'urkundeid',
      ],
      'auto' => true,
      'sequence_name' => 'urkunde_urkundeid_seq',
    ],
  ],
  'urkunde_person' => [
    'display_name' => 'Urkunde Person',
    'description' => '',
    'item_name' => 'Urkunde Person',
    'actions' => [
      0 => MODE_EDIT,
      1 => MODE_NEW,
      2 => MODE_VIEW,
      3 => MODE_LIST,
      4 => MODE_DELETE,
      5 => MODE_LINK,
    ],
    'fields' => [
      'urkunde_id' => [
        'label' => 'Urkunde Id',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'urkunde',
          'field' => 'urkundeid',
          'display' => 'signatur',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Urkunde',
      ],
      'person_id' => [
        'label' => 'Person Id',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'person',
          'field' => 'personid',
          'display' => 'name',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Person',
      ],
      'rolle_id' => [
        'label' => 'Rolle Id',
        'required' => false,
        'editable' => true,
        'type' => T_LOOKUP,
        'pg_info' => [
          'type' => 'integer',
        ],
        'lookup' => [
          'cardinality' => CARDINALITY_SINGLE,
          'table' => 'rollen',
          'field' => 'rollenid',
          'display' => 'rolle',
          'label_display_expr_only' => true,
        ],
        'placeholder' => 'Auswählen: Rollen',
      ],
      'id' => [
        'label' => 'ID',
        'required' => true,
        'editable' => false,
        'type' => T_NUMBER,
        'pg_info' => [
          'type' => 'integer',
          'sequence' => 'urkunde_person_id_seq',
        ],
      ],
    ],
    'primary_key' => [
      'columns' => [
        0 => 'id',
      ],
      'auto' => true,
      'sequence_name' => 'urkunde_person_id_seq',
    ],
  ],
];
