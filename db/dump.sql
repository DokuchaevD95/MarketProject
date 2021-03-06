PGDMP                         v            market    10.3 (Ubuntu 10.3-1)    10.3 (Ubuntu 10.3-1) *    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            �           1262    16384    market    DATABASE     x   CREATE DATABASE market WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'ru_RU.UTF-8' LC_CTYPE = 'ru_RU.UTF-8';
    DROP DATABASE market;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            �           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    13043    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            �           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            �            1259    16514    answers    TABLE     �   CREATE TABLE public.answers (
    id integer NOT NULL,
    question_id integer,
    content text NOT NULL,
    "time" timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.answers;
       public         postgres    false    3            �            1259    16512    answers_id_seq    SEQUENCE     �   CREATE SEQUENCE public.answers_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE public.answers_id_seq;
       public       postgres    false    203    3            �           0    0    answers_id_seq    SEQUENCE OWNED BY     A   ALTER SEQUENCE public.answers_id_seq OWNED BY public.answers.id;
            public       postgres    false    202            �            1259    16426    products    TABLE     
  CREATE TABLE public.products (
    id integer NOT NULL,
    seller integer,
    price real NOT NULL,
    name character varying(50) NOT NULL,
    description text NOT NULL,
    date date DEFAULT CURRENT_DATE NOT NULL,
    is_selled boolean DEFAULT false NOT NULL
);
    DROP TABLE public.products;
       public         postgres    false    3            �            1259    16424    products_id_seq    SEQUENCE     �   CREATE SEQUENCE public.products_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.products_id_seq;
       public       postgres    false    199    3            �           0    0    products_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.products_id_seq OWNED BY public.products.id;
            public       postgres    false    198            �            1259    16444 	   questions    TABLE     �   CREATE TABLE public.questions (
    id integer NOT NULL,
    product_id integer,
    content text NOT NULL,
    "time" timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    user_id integer
);
    DROP TABLE public.questions;
       public         postgres    false    3            �            1259    16442    questions_id_seq    SEQUENCE     �   CREATE SEQUENCE public.questions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.questions_id_seq;
       public       postgres    false    201    3            �           0    0    questions_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.questions_id_seq OWNED BY public.questions.id;
            public       postgres    false    200            �            1259    16398    users    TABLE     �   CREATE TABLE public.users (
    id integer NOT NULL,
    login character varying(20) NOT NULL,
    password character varying(20) NOT NULL,
    name character varying(30) NOT NULL,
    lastname character varying(30) NOT NULL
);
    DROP TABLE public.users;
       public         postgres    false    3            �           0    0    TABLE users    ACL     *   GRANT ALL ON TABLE public.users TO admin;
            public       postgres    false    197            �            1259    16396    users_id_seq    SEQUENCE     �   CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    197    3            �           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    196            �
           2604    16517 
   answers id    DEFAULT     h   ALTER TABLE ONLY public.answers ALTER COLUMN id SET DEFAULT nextval('public.answers_id_seq'::regclass);
 9   ALTER TABLE public.answers ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    202    203    203            �
           2604    16429    products id    DEFAULT     j   ALTER TABLE ONLY public.products ALTER COLUMN id SET DEFAULT nextval('public.products_id_seq'::regclass);
 :   ALTER TABLE public.products ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    199    198    199            �
           2604    16447    questions id    DEFAULT     l   ALTER TABLE ONLY public.questions ALTER COLUMN id SET DEFAULT nextval('public.questions_id_seq'::regclass);
 ;   ALTER TABLE public.questions ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    200    201    201            �
           2604    16401    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    196    197            �          0    16514    answers 
   TABLE DATA               C   COPY public.answers (id, question_id, content, "time") FROM stdin;
    public       postgres    false    203   ,       �          0    16426    products 
   TABLE DATA               Y   COPY public.products (id, seller, price, name, description, date, is_selled) FROM stdin;
    public       postgres    false    199   .,       �          0    16444 	   questions 
   TABLE DATA               M   COPY public.questions (id, product_id, content, "time", user_id) FROM stdin;
    public       postgres    false    201   K,       �          0    16398    users 
   TABLE DATA               D   COPY public.users (id, login, password, name, lastname) FROM stdin;
    public       postgres    false    197   h,       �           0    0    answers_id_seq    SEQUENCE SET     =   SELECT pg_catalog.setval('public.answers_id_seq', 1, false);
            public       postgres    false    202            �           0    0    products_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.products_id_seq', 1, false);
            public       postgres    false    198            �           0    0    questions_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.questions_id_seq', 1, false);
            public       postgres    false    200            �           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 1, false);
            public       postgres    false    196            
           2606    16523    answers answers_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public.answers
    ADD CONSTRAINT answers_pkey PRIMARY KEY (id);
 >   ALTER TABLE ONLY public.answers DROP CONSTRAINT answers_pkey;
       public         postgres    false    203                       2606    16436    products products_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.products DROP CONSTRAINT products_pkey;
       public         postgres    false    199                       2606    16511    questions questions_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.questions DROP CONSTRAINT questions_pkey;
       public         postgres    false    201                       2606    16405    users users_login_key 
   CONSTRAINT     Q   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_login_key UNIQUE (login);
 ?   ALTER TABLE ONLY public.users DROP CONSTRAINT users_login_key;
       public         postgres    false    197                       2606    16403    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    197                       2606    16524     answers answers_question_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.answers
    ADD CONSTRAINT answers_question_id_fkey FOREIGN KEY (question_id) REFERENCES public.questions(id);
 J   ALTER TABLE ONLY public.answers DROP CONSTRAINT answers_question_id_fkey;
       public       postgres    false    203    2824    201                       2606    16437    products products_seller_fkey    FK CONSTRAINT     {   ALTER TABLE ONLY public.products
    ADD CONSTRAINT products_seller_fkey FOREIGN KEY (seller) REFERENCES public.users(id);
 G   ALTER TABLE ONLY public.products DROP CONSTRAINT products_seller_fkey;
       public       postgres    false    2820    197    199                       2606    16452 #   questions questions_product_id_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public.questions
    ADD CONSTRAINT questions_product_id_fkey FOREIGN KEY (product_id) REFERENCES public.products(id);
 M   ALTER TABLE ONLY public.questions DROP CONSTRAINT questions_product_id_fkey;
       public       postgres    false    2822    201    199                       2606    16457     questions questions_user_id_fkey    FK CONSTRAINT        ALTER TABLE ONLY public.questions
    ADD CONSTRAINT questions_user_id_fkey FOREIGN KEY (user_id) REFERENCES public.users(id);
 J   ALTER TABLE ONLY public.questions DROP CONSTRAINT questions_user_id_fkey;
       public       postgres    false    2820    201    197            �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �     