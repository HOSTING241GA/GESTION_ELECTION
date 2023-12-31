PGDMP     9    6    	        	    {           election    15.4    15.4                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    17887    election    DATABASE     {   CREATE DATABASE election WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'French_France.1252';
    DROP DATABASE election;
                postgres    false            �            1259    17905    administrateur    TABLE     �   CREATE TABLE public.administrateur (
    id_administrateur integer NOT NULL,
    mail_administrateur character varying,
    mdp_administrateur character varying,
    id_electeur integer
);
 "   DROP TABLE public.administrateur;
       public         heap    postgres    false            �            1259    17904 $   administrateur_id_administrateur_seq    SEQUENCE     �   CREATE SEQUENCE public.administrateur_id_administrateur_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ;   DROP SEQUENCE public.administrateur_id_administrateur_seq;
       public          postgres    false    217                       0    0 $   administrateur_id_administrateur_seq    SEQUENCE OWNED BY     m   ALTER SEQUENCE public.administrateur_id_administrateur_seq OWNED BY public.administrateur.id_administrateur;
          public          postgres    false    216            �            1259    17889    electeur    TABLE     M  CREATE TABLE public.electeur (
    id_electeur integer NOT NULL,
    nom_electeur character varying NOT NULL,
    prenom_electeur character varying,
    adresse_electeur character varying,
    date_naissance character varying,
    num_cni character varying,
    mail_electeur character varying,
    mdp_electeur character varying
);
    DROP TABLE public.electeur;
       public         heap    postgres    false            �            1259    17888    electeur_id_electeur_seq    SEQUENCE     �   CREATE SEQUENCE public.electeur_id_electeur_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.electeur_id_electeur_seq;
       public          postgres    false    215                       0    0    electeur_id_electeur_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.electeur_id_electeur_seq OWNED BY public.electeur.id_electeur;
          public          postgres    false    214            �            1259    17940    election    TABLE     \   CREATE TABLE public.election (
    id_election integer NOT NULL,
    debut_election date
);
    DROP TABLE public.election;
       public         heap    postgres    false            �            1259    17939    election_id_election_seq    SEQUENCE     �   CREATE SEQUENCE public.election_id_election_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.election_id_election_seq;
       public          postgres    false    219                       0    0    election_id_election_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.election_id_election_seq OWNED BY public.election.id_election;
          public          postgres    false    218            p           2604    17908     administrateur id_administrateur    DEFAULT     �   ALTER TABLE ONLY public.administrateur ALTER COLUMN id_administrateur SET DEFAULT nextval('public.administrateur_id_administrateur_seq'::regclass);
 O   ALTER TABLE public.administrateur ALTER COLUMN id_administrateur DROP DEFAULT;
       public          postgres    false    216    217    217            o           2604    17892    electeur id_electeur    DEFAULT     |   ALTER TABLE ONLY public.electeur ALTER COLUMN id_electeur SET DEFAULT nextval('public.electeur_id_electeur_seq'::regclass);
 C   ALTER TABLE public.electeur ALTER COLUMN id_electeur DROP DEFAULT;
       public          postgres    false    215    214    215            q           2604    17943    election id_election    DEFAULT     |   ALTER TABLE ONLY public.election ALTER COLUMN id_election SET DEFAULT nextval('public.election_id_election_seq'::regclass);
 C   ALTER TABLE public.election ALTER COLUMN id_election DROP DEFAULT;
       public          postgres    false    218    219    219            
          0    17905    administrateur 
   TABLE DATA           q   COPY public.administrateur (id_administrateur, mail_administrateur, mdp_administrateur, id_electeur) FROM stdin;
    public          postgres    false    217   }                 0    17889    electeur 
   TABLE DATA           �   COPY public.electeur (id_electeur, nom_electeur, prenom_electeur, adresse_electeur, date_naissance, num_cni, mail_electeur, mdp_electeur) FROM stdin;
    public          postgres    false    215   �                 0    17940    election 
   TABLE DATA           ?   COPY public.election (id_election, debut_election) FROM stdin;
    public          postgres    false    219   �#                  0    0 $   administrateur_id_administrateur_seq    SEQUENCE SET     R   SELECT pg_catalog.setval('public.administrateur_id_administrateur_seq', 5, true);
          public          postgres    false    216                       0    0    electeur_id_electeur_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.electeur_id_electeur_seq', 14, true);
          public          postgres    false    214                       0    0    election_id_election_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.election_id_election_seq', 1, true);
          public          postgres    false    218            u           2606    17912 "   administrateur administrateur_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY public.administrateur
    ADD CONSTRAINT administrateur_pkey PRIMARY KEY (id_administrateur);
 L   ALTER TABLE ONLY public.administrateur DROP CONSTRAINT administrateur_pkey;
       public            postgres    false    217            s           2606    17896    electeur electeur_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.electeur
    ADD CONSTRAINT electeur_pkey PRIMARY KEY (id_electeur);
 @   ALTER TABLE ONLY public.electeur DROP CONSTRAINT electeur_pkey;
       public            postgres    false    215            w           2606    17945    election election_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.election
    ADD CONSTRAINT election_pkey PRIMARY KEY (id_election);
 @   ALTER TABLE ONLY public.election DROP CONSTRAINT election_pkey;
       public            postgres    false    219            x           2606    17913 .   administrateur administrateur_id_electeur_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.administrateur
    ADD CONSTRAINT administrateur_id_electeur_fkey FOREIGN KEY (id_electeur) REFERENCES public.electeur(id_electeur) NOT VALID;
 X   ALTER TABLE ONLY public.administrateur DROP CONSTRAINT administrateur_id_electeur_fkey;
       public          postgres    false    3187    215    217            
     x�}�Ko�@ �3��XPzS��""e���",}k{��e��$_2��/1Ay��5��G�T���'zg�4��Y�I�U���0��d�_���S�Mo��ζ�uMUwU>HB7mz��yG�7h��d��<�B�F���aT��X(��F���;�89�U��c8jOTx��F����6�v����� ��Ҁ�p���:���p�o�N��H][�&i��q��W�Q	��^�G�R]){5�]Q�[�:L���4^0�L6��ޟ�� KTuN         �  x���Ɏ�8F����m a�� I�t7̌I���Mj���R�u���eY>ǟd`�)���WOs���ť�Ĺ*�Wzx��(�b�����&���t6%:������j�<ކ)]d�"�p��ݺ8���*�o������᱿��[�\�a��V>!�!����m��"ɑ���ڦ�g��d:�7@��UW�O�7�CU+�����;f�1;x�U�n:�5�˴�-c��Tf��(N�b���H�$�o�$ Qd&�� �9�¾��x�@���+�#]� �s�x�LE�$마��� �|���kX��I��b�'�������8nB�@c"#2+�l���(�|������R0��l*���Ԁm&RJ�˩��[����[4mq.�[�p�[we��K�0�����y�WZ��'��P`�M���UV]�ƍ_��-H�������}��t[��P�vq�*ˬq�[(��l����9���8�Y���H�V/����łq���$�O%�c дH?c�\\�[[�]�4�"O���u�TZcz=���02[07;��Ƞ1,��z� ���4.`�dJ��I�Q�mC11��ԏD���F<��@���?���^n��~��}�\yV�.�Ւ�c�4�|�u�	�au����o2x4R���>�;��%�a`LD���G��.9�z9�5�9����Y�/�%�Ϯ)����hT(gtB�љ�����:;�r��J���ȡ)�"�H�{����?k�Ԫ?��8k����O�]�}�9]��Qs6ވ:Φ��;����C#�:��`'��� �����<��i�Ƶ_���Q+O�3�P�����a��{�=��<,�$TQ��G��8`F��(0>y;��$S������{�	ſk��sX�ҿ��)��@xΖ�eu���A���P�E��r�K�����^Ă���~G��,��>w9o;}?��!z9c�<u��ǔ��aey�_[����<���](�/��? ���            x�3�4202�54�54����� ��     